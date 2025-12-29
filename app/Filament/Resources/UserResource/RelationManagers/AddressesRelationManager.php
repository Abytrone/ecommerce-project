<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'billing' => 'Billing',
                        'shipping' => 'Shipping',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('line_1')
                    ->label('Address Line 1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('line_2')
                    ->label('Address Line 2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip')
                    ->label('Zip Code')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('line_1')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'billing' => 'info',
                        'shipping' => 'success',
                    }),
                Tables\Columns\TextColumn::make('line_1')->label('Address'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('zip')->label('Zip'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
