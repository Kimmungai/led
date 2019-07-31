<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;
    public $invoice;
    public $pathToPDF;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($invoice,$pathToPDF)
     {
       $this->invoice = $invoice;
       $this->pathToPDF = $pathToPDF;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice')->attach($this->pathToPDF,['as' => 'Invoice.pdf']);
    }
}
