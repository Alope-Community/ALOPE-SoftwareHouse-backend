<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\BlogCategory;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Hidden::make('blog_category_id')->reactive(),

                Wizard::make([

                    Step::make('Blog Category')
                        ->schema([
                            Radio::make('blog_category_mode')
                                ->label('Input Mode')
                                ->options([
                                    'new' => 'New Category',
                                    'choose' => 'Choose on ready category',
                                ])
                                ->afterStateUpdated(function ($set, $state) {
                                    if ($state === 'new') {
                                        $set('blog_category_id', null);
                                    }
                                })
                                ->default('new')
                                ->inline()
                                ->required()
                                ->reactive(),

                            TextInput::make('blog_category_name')
                                ->label('New Category')
                                ->required(fn($get) => $get('blog_category_mode') === 'new')
                                ->visible(fn($get) => $get('blog_category_mode') === 'new')
                                ->columnSpanFull()
                                ->live()
                                ->afterStateUpdated(function ($set, $state) {
                                    $set('blog_category_slug', \Illuminate\Support\Str::slug($state));
                                }),

                            TextInput::make('blog_category_slug')
                                ->label('Slug')
                                ->readOnly()
                                ->required(fn($get) => $get('blog_category_mode') === 'new')
                                ->visible(fn($get) => $get('blog_category_mode') === 'new')
                                ->columnSpanFull(),

                            Select::make('blog_category_id')
                                ->label('Choose Blog Category')
                                ->options(BlogCategory::pluck('name', 'id'))
                                ->searchable()
                                ->preload()
                                ->required(fn($get) => $get('blog_category_mode') === 'choose')
                                ->visible(fn($get) => $get('blog_category_mode') === 'choose')
                                ->reactive(),

                            Actions::make([
                                Action::make('deleteCategory')
                                    ->label('Delete Selected Category')
                                    ->color('danger')
                                    ->icon('heroicon-o-trash')
                                    ->visible(fn($get) => filled($get('blog_category_id')))
                                    ->action(function ($get, $set) {
                                        $categoryId = $get('blog_category_id');
                                        if ($categoryId) {
                                            $category = \App\Models\BlogCategory::find($categoryId);
                                            if ($category) {
                                                $category->delete();
                                                $set('blog_category_id', null);
                                            }
                                        }
                                    })
                                    ->requiresConfirmation()
                                    ->modalHeading('Delete Category')
                                    ->modalDescription('Are you sure you want to delete this category? This action cannot be undone.')
                                    ->modalSubmitActionLabel('Yes, delete it'),
                            ]),

                        ])->afterValidation(function ($get, $set) {
                            if ($get('blog_category_mode') === 'new') {
                                $blogCategory = BlogCategory::create([
                                    'name' => $get('blog_category_name'),
                                    'slug' => $get('blog_category_slug'),
                                ]);
                                $set('blog_category_id', $blogCategory->id);
                            }
                        }),

                    Step::make('Blog Detail')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->live()
                                ->afterStateUpdated(function ($set, $state) {
                                    $set('slug', \Illuminate\Support\Str::slug($state));
                                }),

                            TextInput::make('slug')
                                ->readOnly()
                                ->required(),

                            FileUpload::make('image')
                                ->image()
                                ->disk('public')
                                ->directory('blogs')
                                ->visibility('public')
                                ->required(),

                            RichEditor::make('content')
                                ->required()
                                ->columnSpanFull()
                                ->extraAttributes([
                                    'style' => 'min-height: 300px;',
                                ]),

                        ])
                ])->columnSpanFull(),
            ]);
    }
}
