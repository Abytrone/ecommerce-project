<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Operations';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Order Summary')
                            ->schema([
                                Forms\Components\TextInput::make('number')
                                    ->default('OR-' . random_int(100000, 999999))
                                    ->disabled()
                                    ->dehydrated()
                                    ->required(),
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'processing' => 'Processing',
                                        'shipped' => 'Shipped',
                                        'delivered' => 'Delivered',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->native(false),
                                Forms\Components\Hidden::make('currency')
                                    ->default('GHS')
                                    ->required(),
                                Forms\Components\MarkdownEditor::make('notes')
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Forms\Components\Section::make('Order Items')
                            ->schema([
                                Forms\Components\Repeater::make('items')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            ->relationship('product', 'name')
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                                $product = \App\Models\Product::find($state);
                                                $price = $product?->price ?? 0;
                                                $set('unit_price', $price);
                                                $set('total_price', $price * $get('quantity'));
                                            })
                                            ->columnSpan(['md' => 5]),

                                        Forms\Components\TextInput::make('quantity')
                                            ->numeric()
                                            ->default(1)
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                                $unitPrice = $get('unit_price') ?? 0;
                                                $set('total_price', $state * $unitPrice);
                                            })
                                            ->columnSpan(['md' => 2]),

                                        Forms\Components\TextInput::make('unit_price')
                                            ->label('Unit Price')
                                            ->disabled()
                                            ->dehydrated()
                                            ->numeric()
                                            ->prefix('GHS')
                                            ->required()
                                            ->columnSpan(['md' => 3]),

                                        Forms\Components\Hidden::make('total_price')
                                            ->default(0),
                                    ])
                                    ->live()
                                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                                        $items = $get('items');
                                        $total = collect($items)->sum(fn($item) => ($item['quantity'] ?? 0) * ($item['unit_price'] ?? 0));
                                        $set('total_price', $total);
                                    })
                                    ->defaultItems(0)
                                    ->columns(['md' => 10])
                                    ->itemLabel(fn(array $state): ?string => \App\Models\Product::find($state['product_id'] ?? null)?->name ?? null),
                            ]),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Payment & Shipping')
                            ->schema([
                                Forms\Components\TextInput::make('total_price')
                                    ->label('Total Price (GHS)')
                                    ->numeric()
                                    ->prefix('GHS')
                                    ->readOnly() // Calculated automatically
                                    ->placeholder('Calculated automatically'),
                                Forms\Components\TextInput::make('shipping_price')
                                    ->numeric()
                                    ->prefix('GHS'),
                                // Forms\Components\TextInput::make('shipping_method')
                                //     ->placeholder('FedEx, DHL, etc.'),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('total_price')
                    ->money('ghs')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pay_cod')
                    ->label('Pay COD')
                    ->icon('heroicon-o-currency-dollar')
                    ->color('success')
                    ->visible(fn(Order $record) => $record->status === 'pending' || $record->status === 'processing')
                    ->form([
                        Forms\Components\TextInput::make('amount')
                            ->label('Amount to Pay')
                            ->default(fn(Order $record) => $record->total_price)
                            ->disabled()
                            ->dehydrated()
                            ->required(),
                    ])
                    ->action(function (Order $record) {
                        \App\Models\Transaction::create([
                            'order_id' => $record->id,
                            'payment_method' => 'cash_on_delivery',
                            'amount' => $record->total_price,
                            'status' => 'success',
                            'transaction_id' => 'COD-' . strtoupper(uniqid()),
                        ]);

                        $record->update(['status' => 'processing']);

                        // Send email notification
                        try {
                            \Illuminate\Support\Facades\Mail::to($record->user)->send(new \App\Mail\PaymentReceived($record));
                        } catch (\Exception $e) {
                            // Log error but don't fail the action
                            \Illuminate\Support\Facades\Log::error('Failed to send payment email: ' . $e->getMessage());
                        }

                        \Filament\Notifications\Notification::make()
                            ->title('Payment Recorded')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
