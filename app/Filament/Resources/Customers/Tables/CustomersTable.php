<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;



class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')->label('First Name')->sortable()->searchable(),
                TextColumn::make('lastname')->label('Last Name')->sortable()->searchable(),
                TextColumn::make('mobilenumber')->label('Mobile Number')->sortable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
            ])
            ->filters([
                
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
