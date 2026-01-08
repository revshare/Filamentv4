<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('firstname')
                ->label('First Name')
                ->required()
                ->maxLength(255),

            TextInput::make('lastname')
                ->label('Last Name')
                ->required()
                ->maxLength(255),

            TextInput::make('mobilenumber')
                ->label('Mobile Number')
                ->required()
                ->tel(), // optional, adds type="tel"

            TextInput::make('email')
                ->label('Email')
                ->email() // validates email
                ->required()
                ->unique(ignoreRecord: true), // prevents duplicate emails
        ]);
    }
}
