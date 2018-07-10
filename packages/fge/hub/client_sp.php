<?php
namespace fge\hub;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class client_sp extends ServiceProvider
{
    private $url="http://192.108.24.131/nuc/public/";
    //private $url="http://localhost:8000/";
    private $envname="URL_FGE-HUBS";
    public function map()
    {
        Route::prefix('fge_tok')
             ->group(__DIR__.'/routes/web.php');
    }
    public function boot()
    {
        if(env($this->envname)==null){
            $envFile = app()->environmentFilePath();
            $str = file_get_contents($envFile)."\n".$this->envname."=".$this->url;
            $fp = fopen($envFile, 'w');
            fwrite($fp, $str);
            fclose($fp);
        }
        $this->publishes([
            __DIR__.'/assets' => public_path('fge_tok-hub'),
        ], 'public');
        $this->loadViewsFrom(__DIR__.'/views', 'fge_tok-hub');
        parent::boot();
    }
}
//php artisan vendor:publish --tag=public --force