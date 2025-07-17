<?php

namespace Afsdarif\FilamentSimplePages\Pages;

use Filament\Pages\Page;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Support\Htmlable;
use Afsdarif\FilamentSimplePages\FilamentSimplePagesPlugin;
use Afsdarif\FilamentSimplePages\Traits\SimplePageTrait;

class SimplePage extends Page
{
    use SimplePageTrait;

    protected string $view = 'filament-simple-pages::filament.pages.simple-page';

    protected static bool $shouldRegisterNavigation = false;

    public $record;

    public function getHeading(): string
    {
        return $this->record->title ?? 'Simple Page';
    }

    public function getSlug() : string
    {
        return FilamentSimplePagesPlugin::get()->getPrefixSlug() . '/{slug}';
    }

    public function getTitle(): string | Htmlable
    {
        return $this->record->title ?? 'Simple Page';
    }

    public function shouldRegisterSpotlight(): bool
    {
        return false;
    }

    public function mount($slug)
    {
        $this->record = \Afsdarif\FilamentSimplePages\Models\SimplePage::where('slug', $slug)->first();

        $this->abortIfNotPublic($this->record);

        $this->indexable($this->record);
    }
}
