<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Details')
                    ->schema([
                        TextEntry::make('blogCategory.name')
                            ->label('Category'),

                        TextEntry::make('title')
                            ->label('Title'),

                        TextEntry::make('slug')
                            ->label('Slug'),

                        ImageEntry::make('image')
                            ->label('Image')
                            ->width(200),

                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->label('Updated At')
                            ->dateTime(),
                    ])->columnSpanFull(),
            ]);
    }
}
