<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotify extends Notification implements ShouldQueue
{
    use Queueable;
    private $pedido;
    private $FakeProducts;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pedido, $FakeProducts)
    {
        $this->pedido = $pedido;
        $this->FakeProducts = $FakeProducts;
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
        ->markdown('mail.pedido.paid', ['pedido' => $this->pedido, 'PRODUTOS' => $this->FakeProducts]);
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
