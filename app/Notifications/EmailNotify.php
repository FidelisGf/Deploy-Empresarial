<?php

namespace App\Notifications;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotify extends Notification implements ShouldQueue
{
    use Queueable;
    private $pedido;
    private $FakeProducts;
    private $bool;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pedido, $FakeProducts, $bool)
    {
        $this->pedido = $pedido;
        if($bool){
            foreach($FakeProducts as $f){
                $qntd = $f->QUANTIDADE;
                $f = Product::where('ID', '=', $f->ID_PRODUTO)->
                select('ID','NOME','VALOR')->first();
                $f->QUANTIDADE = $qntd;
            }
            $this->FakeProducts = $FakeProducts;
        }else{
            $this->FakeProducts = $FakeProducts;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('test@example.com', 'Seu pedido')
        ->greeting('Ola Sr(a)')
        ->markdown('mail.pedido.paid',
        ['pedido' => $this->pedido,
        'PRODUTOS' => $this->FakeProducts]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
