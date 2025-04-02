<?php

namespace App\Filament\Guest\Pages;

use App\Models\Game;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Infolist;
use Filament\Pages\Page;
use Filament\Pages\SimplePage;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Illuminate\Contracts\Support\Htmlable;

class GameDetail extends SimplePage
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.guest.pages.game-detail';

    protected static ?string $title = '';

    public $record;

    public function mount(int | string $record): void
    {
        $this->record = Game::where('slug', $record)->firstOrFail();
    }

    public function getTitle(): string | Htmlable
    {
        return $this->record->title;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->record)
            ->columns(12)
            ->schema([
                ImageEntry::make('image_url')
                    ->disk('public')
                    ->label('')
                    ->columnSpan(4)
                    ->circular(),
                Group::make()
                    ->columnSpan(8)
                    ->schema([
                        TextEntry::make('description')
                            ->label('')
                            ->html()
                            ->extraAttributes(['class' => 'text-sm']),
                        TextEntry::make('category.name')
                            ->badge()
                            ->label(''),
                        TextEntry::make('user.name')
                            ->label('Author')
                            ->badge()
                            ->extraAttributes(['class' => 'text-sm']),
                    ]),
                Actions::make([
                    Action::make('play')
                        ->label('Play Now')
                        ->icon('heroicon-o-play')
                        ->url(fn(Game $record): string => route('game.play', $record->slug))
                        ->color('primary'),
                ])->columnSpanFull()
                    ->alignEnd()
            ]);
    }
}
