<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // -----------------------------
                // User Information Section
                // -----------------------------
                Section::make('User Information')
                    ->columns(2) // everything stacked vertically
                    ->components([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        
                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->placeholder('Select date'), // date only   

                        Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->placeholder('Select Gender'),  
                        
                         

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('mobilenum')
                            ->label('Mobile Number')
                            ->tel()
                            ->maxLength(20),

                        TextInput::make('address')
                            ->label('Address')
                            ->maxLength(255),
                         
                        Toggle::make('status')
                            ->label('Active')
                            ->default(1)              // default value in DB
                            ->dehydrateStateUsing(fn ($state) => $state ? 1 : 0) // saves 1/0
                            ->reactive()
                    ]),

                // -----------------------------
                // Security Section
                // -----------------------------
                Section::make('Security')
                    ->columns(1) // stacked vertically
                    ->components([
                        TextInput::make('password')
                            ->password()
                            ->label('Password')
                            ->required(fn (string $operation) => $operation === 'create')
                            ->hidden(fn (string $operation) => $operation === 'edit') // <-- hide when editing
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),

                        Select::make('roles')
                            ->label('Roles')
                            //->multiple()
                            ->relationship('roles', 'name')
                            ->preload()
                            ->searchable(),
                    ]),
            ]);
    }
}
