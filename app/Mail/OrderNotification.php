<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $product = Product::find($this->order->product_id);

        return $this->from(env('MAIL_FROM_ADDRESS'))
                ->to($this->order->email)
                ->bcc(env('ADMIN_EMAIL'))
                ->subject('TAHSINKO® Lift & Escalator - One of The Best Lift Company In Bangladesh')
                ->view('email.ordernotification')
                ->with([
                    'order' => $this->order,
                    'product' => $product,
                ]);
    }
}
