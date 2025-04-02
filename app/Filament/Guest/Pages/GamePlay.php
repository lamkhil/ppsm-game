<?php

namespace App\Filament\Guest\Pages;

use App\Models\Game;
use Filament\Pages\Page;
use Filament\Pages\SimplePage;
use Filament\Support\Enums\MaxWidth;

class GamePlay extends SimplePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.guest.pages.game-play';

    public $record;

    public $playing = false;

    public function getMaxWidth(): MaxWidth | string | null
    {
        return MaxWidth::Full;
    }

    public function mount(int | string $record): void
    {
        $this->record = Game::where('slug', $record)->firstOrFail();
    }

    public function getLayout(): string
    {
        return 'components.layouts.app';
    }

    public function play()
    {
        $this->playing = true;
    }
}
