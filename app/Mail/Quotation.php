<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Quotation extends Mailable
{
    use Queueable, SerializesModels;
    public $quote;
    public $pathToPDF;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quote,$pathToPDF)
    {
      $this->quote = $quote;
      $this->pathToPDF = $pathToPDF;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.quote')->attach($this->pathToPDF,['as' => 'nyau.pdf']);
    }
}
