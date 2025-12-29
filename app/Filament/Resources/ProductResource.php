<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationGroup = 'Shop Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product Information')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->unique(Product::class, 'sku', ignoreRecord: true),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Pricing')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->numeric()
                                    ->prefix('GHS')
                                    ->required(),
                                Forms\Components\TextInput::make('cost_price')
                                    ->numeric()
                                    ->prefix('GHS')
                                    ->helperText('Customers won\'t see this price.'),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Inventory')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Forms\Components\TextInput::make('stock')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                                Forms\Components\TextInput::make('security_stock')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('The safe stock limit for alerts.'),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('images')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->directory('products')
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),

                Forms\Components\Section::make('Visibility')
                    ->schema([
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Visible to customers')
                            ->default(true),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Product'),
                        Forms\Components\DatePicker::make('published_at')
                            ->label('Availability Date')
                            ->default(now()),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->circular()
                    ->stacked()
                    ->disk('public')
                    ->limit(3),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('price')
                    ->money('ghs')
                    ->sortable()
                    ->color('success'),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
                    ->color(fn(string $state): string => $state < 10 ? 'danger' : 'success'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_visible')
                    ->label('Visibility'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
