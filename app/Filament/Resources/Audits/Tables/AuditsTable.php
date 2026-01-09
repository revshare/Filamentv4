<?php

namespace App\Filament\Resources\Audits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class AuditsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User'),
                TextColumn::make('auditable_type'),
                TextColumn::make('event'),
                TextColumn::make('old_values')->limit(50),
                TextColumn::make('new_values')->limit(50),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            // ->recordActions([
            //     //EditAction::make(),
            // ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
