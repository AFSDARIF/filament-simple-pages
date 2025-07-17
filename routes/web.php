<?php

use Illuminate\Support\Facades\Route;
use Afsdarif\FilamentSimplePages\FilamentSimplePagesPlugin;
use Afsdarif\FilamentSimplePages\Livewire\SimplePage as LivewireSimplePage;

try {

    $prefixSlug = FilamentSimplePagesPlugin::get()->getPrefixSlug();

} catch(\Exception $e) {

    $prefixSlug = null;

}

if ($prefixSlug) {
    Route::get('/'.$prefixSlug.'/{slug}', LivewireSimplePage::class);
}