<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable(),
                TextColumn::make('mobilenum')
                    ->label('Mobile Number')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),

                TextColumn::make('dob')
                    ->label('Date of Birth')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ,   
                TextColumn::make('status')
                    ->formatStateUsing(fn ($state) => $state ? 'Active' : 'Inactive')
                     ->badge()
                    ->label('Status'),     
                TextColumn::make('roles.name')
                    ->badge()
                    //->separator(',')
                    ->searchable()
                    ->label('Roles'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
