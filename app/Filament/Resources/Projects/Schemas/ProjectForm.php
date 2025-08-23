<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Section')
                    ->description('This form is used to enter data for the "Main Project Section".')
                    ->schema([
                        TextInput::make('title')
                            ->required(),

                        FileUpload::make('image')
                            ->image()
                            ->directory('projects')
                            ->required(),

                    ])->columnSpanFull(),

                Section::make('Project Info Section')
                    ->relationship('projectInfo')
                    ->description('This form is used to enter data for the "Main Project Info Section".')
                    ->schema([
                        TextInput::make('client'),

                        TextInput::make('platform'),

                        TextInput::make('timeline'),

                        TextInput::make('url')
                            ->label('URL'),

                    ]),

                Section::make('"About This Project" Section')
                    ->description('This form is used to fill out the "About This Project" section.')
                    ->relationship('aboutProject')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('projects'),

                        Textarea::make('description'),
                    ]),

                Section::make('"Feature Project" Section')
                    ->description('This form is used to fill out the "Feature Project" section.')
                    ->relationship('featureProject')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('projects'),

                        Textarea::make('description'),
                    ]),

                Section::make('"Stack Project" Section')
                    ->description('This form is used to fill out the "Stack Project" section.')
                    ->relationship('stackProject')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('projects'),

                        Textarea::make('description'),
                    ]),

            ]);
    }
}
