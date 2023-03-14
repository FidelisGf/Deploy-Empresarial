<?php

namespace App\Listeners;

use App\Events\MakeLog;
use App\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLog
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MakeLog  $event
     * @return void
     */
    public function handle(MakeLog $event)
    {
        $log = new Log();
        $log->TELA = $event->tela;
        $log->TIPO = $event->tipo;
        $log->CAMPO = $event->campo;
        $log->NOVO_VALOR = $event->novo_valor;
        $log->ANTIGO_VALOR = $event->antigo_valor;
        $log->ID_ITEM = $event->id_item;
        $log->ID_EMPRESA = $event->id_empresa;
        $log->ID_USER = $event->id_user;
        $log->save();



    }
}
