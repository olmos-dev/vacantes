<?php

namespace App\Providers;

use App\Categoria;
use View;
use Illuminate\Support\ServiceProvider;

class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**Se crea una consuta donde se tienen todas las categorias
         * para realizar un menu por categorias, y esta consulta
         * este disponible en todas las vistas, pero importante
         * podemos declarar en las vistas que solo queremos que se
         * muestre el menu filtrado por las catergorias
         */
        View::composer('*',function($view){
            $categorias = Categoria::orderBy('nombre','asc')->get(['id','nombre']);
            //ddd($categorias);
            $view->with('categorias',$categorias);
        });
    }
}
