<?php

namespace App\Filament\Guest\Pages;

use App\Models\Game;
use Filament\Pages\Page;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;

class GameList extends SimplePage implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.guest.pages.game-list';

    public function getMaxWidth(): MaxWidth | string | null
    {
        return MaxWidth::ScreenLarge;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Game::query())
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->circular()
                    ->disk('public')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Game $record): string => route('game.detail', $record->slug))
                    ->icon('heroicon-o-eye')
                    ->color('primary'),
            ])
            ->bulkActions([
                // ...
            ]);
    }


}
