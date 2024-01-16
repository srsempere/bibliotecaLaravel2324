<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Policies\ArticuloPolicy;
use App\Policies\CategoriaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Categoria::class => CategoriaPolicy::class,
        Articulo::class => ArticuloPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
