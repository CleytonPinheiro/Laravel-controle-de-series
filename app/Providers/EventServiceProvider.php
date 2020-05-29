<?php

namespace App\Providers;

use App\Events\NovaSerie;
use App\Listeners\EnviarEmailNovaSerieCadastrada;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NovaSerie::class => [
            //Associando listener ao evento para execução em fila forma assíncrona
            \EnviarEmailNovaSerieCadastrada::class,
            \App\Listeners\LogNovaSerieCadastrada::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
