<?php

namespace App\Events;

use App\Cliente;
use App\Pedidos;
use App\Venda;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class VendaGerada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $venda ;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Pedidos $venda)
    {
        $this->venda = $venda;
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
