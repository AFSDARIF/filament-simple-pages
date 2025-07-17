<?php

namespace Afsdarif\FilamentSimplePages\Livewire;

use Livewire\Component;
use Afsdarif\FilamentSimplePages\Models\SimplePage as ModelsSimplePage;
use Afsdarif\FilamentSimplePages\Traits\SimplePageTrait;

class SimplePage extends Component
{
    use SimplePageTrait;

    public $record;

    public function mount($slug)
    {
        $this->record = ModelsSimplePage::where('slug', $slug)->firstOrFail();
       
        $this->abortIfNotPublic($this->record);

        $this->abortIfNotOutsideAccessable($this->record);
        
        view()->share('filamentSimplePages_indexable', $this->record->indexable ?? false);
    }

    public function render()
    {
        $view = view('filament-simple-pages::livewire.simple-page');

        if ($this->record->title !== null) {
            $view->title($this->record->title);
        }

        if ($this->record->layout !== null) {
            $view->layout($this->record->layout);
        }

        if ($this->record->extends !== null) {
            $view->extends($this->record->extends);
        }

        if ($this->record->section !== null) {
            $view->section($this->record->section);
        }
        
        return $view;
    }
}
