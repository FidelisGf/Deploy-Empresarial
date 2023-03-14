<?php

namespace App\Events;

use App\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MakeLog
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $tela;
    public $campo;
    public $tipo;
    public $novo_valor;
    public $antigo_valor;
    public $id_item;
    public $id_empresa;
    public $id_user;
    public function __construct($tela, $campo, $tipo, $novo_valor, $antigo_valor, $id_item, $id_empresa, $id_user)
    {
        $this->tela = $tela;
        $this->campo = $campo;
        $this->tipo = $tipo;
        $this->novo_valor = $novo_valor;
        $this->antigo_valor = $antigo_valor;
        $this->id_item = $id_item;
        $this->id_empresa = $id_empresa;
        $this->id_user = $id_user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
