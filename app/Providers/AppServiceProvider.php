<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Pessoa;
use \App\Cidade;
use \App\Fabricante;
use \App\Tipo_veiculo;
use \App\Veiculos;
use App\Venda;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('PESSOAS');
            $event->menu->add([
                'text'        => 'Pessoas',
                'url'         => 'pessoas',
                'icon'        => 'fas fa-fw fa-users',
                'label'       => Pessoa::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Cidades',
                'url'         => 'cidades',
                'icon'        => 'fas fa-fw fa-flag',
                'label'       => Cidade::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add('VEICULOS');
            $event->menu->add([
                'text'        => 'Fabricantes',
                'url'         => 'fabricantes',
                'icon'        => 'fas fa-fw fa-industry',
                'label'       => Fabricante::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Tipo de Veiculo',
                'url'         => 'tipo_veiculos',
                'icon'        => 'fas fa-fw fa-tag',
                'label'       => Tipo_veiculo::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Veiculos',
                'url'         => 'veiculos',
                'icon'        => 'fas fa-fw fa-car',
                'label'       => Veiculos::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add('VENDAS');
            $event->menu->add([
                'text'        => 'Vendas',
                'url'         => 'vendas',
                'icon'        => 'fas fa-fw fa-handshake',
                'label'       => Venda::count(),
                'label_color' => 'success',
            ]);
        });
    }
}
