<?php
namespace fge\hub;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class server_sp extends ServiceProvider
{
    public function map()
    {
        Route::prefix('fge_tok')
             ->group(__DIR__.'/routes/web.php');
    }
    public function boot()
    {
        $this->publishes([
            __DIR__.'/assets' => public_path('fge_tok-hub'),
        ], 'public');
        $this->loadViewsFrom(__DIR__.'/views', 'fge_tok-hub');
        parent::boot();
    }
}
//php artisan vendor:publish --tag=public --force