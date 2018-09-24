<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcess extends Mailable
{
    use Queueable, SerializesModels;

    public $user_order;

    public function __construct($user_order)
    {
        $this->user_order = $user_order;
    }

    public function build()
    {
        return $this->from('thebag.bg')
                    ->subject('Успешна поръчка в thebag.bg')
                    ->view('emails.order_process')
                    ->with('user_order', $this->user_order);
    }
}
