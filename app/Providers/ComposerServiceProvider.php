<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Panggil composer views
use App\Views\Composers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Panggil navigations composer dari App\Views\Composers 
        // view()->composer('layouts.frontend.sidebar', NavigationComposer::class);
        // view()->composer('layouts.frontend.footer', NavigationComposer::class);
        // di folder views/livewire/main
        view()->composer('livewire.frontend.main.sidebar', NavigationComposer::class);
        view()->composer('livewire.frontend.main.footer', NavigationComposer::class);
        
        // disini isi service helper filter category dipindah ke file App\Views\NavigationComposer agar lebih rapih       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
