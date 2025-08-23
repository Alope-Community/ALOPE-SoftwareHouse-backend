<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Section')
                    ->description('Displays data for the "Main Project Section".')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Title'),

                        ImageEntry::make('image')
                            ->label('Project Image')
                            ->width(150),

                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->label('Updated At')
                            ->dateTime(),
                    ])
                    ->columnSpanFull(),

                Section::make('Project Info Section')
                    ->description('Displays data for the "Main Project Info Section".')
                    ->relationship('projectInfo')
                    ->schema([
                        TextEntry::make('client')
                            ->label('Client'),

                        TextEntry::make('platform')
                            ->label('Platform'),

                        TextEntry::make('timeline')
                            ->label('Timeline'),

                        TextEntry::make('url')
                            ->label('URL')
                            ->url(fn(string $state): string => $state)
                            ->openUrlInNewTab(),
                    ]),

                Section::make('"About This Project" Section')
                    ->description('Displays content from the "About This Project" section.')
                    ->relationship('aboutProject')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('About Image')
                            ->width(150),

                        TextEntry::make('description')
                            ->label('Description'),
                    ]),

                Section::make('"Feature Project" Section')
                    ->description('Displays content from the "Feature Project" section.')
                    ->relationship('featureProject')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Feature Image')
                            ->width(150),

                        TextEntry::make('description')
                            ->label('Description'),
                    ]),

                Section::make('"Stack Project" Section')
                    ->description('Displays content from the "Stack Project" section.')
                    ->relationship('stackProject')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Stack Image')
                            ->width(150),

                        TextEntry::make('description')
                            ->label('Description'),
                    ]),
            ]);
    }
}
