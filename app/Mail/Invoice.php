<?php

namespace App\Mail;
use App\booking_detail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;
    protected $booking_detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(booking_detail $booking_detail)
    {
        $this->booking_detail=$booking_detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoice',['booking_detail' => $this->booking_detail]);
    }
}
