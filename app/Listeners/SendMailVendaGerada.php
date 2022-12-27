<?php

namespace App\Listeners;

use App\Cliente;
use App\Events\VendaGerada;
use App\Mail\SendMailUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailVendaGerada
{

    //public $afterCommit = true;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  VendaGerada  $event
     * @return void
     */
    public function handle(VendaGerada $event)
    {

        $email = $event->venda->cliente->EMAIL;
        Mail::to($email)->queue(new SendMailUser($event->venda));
    }
}

