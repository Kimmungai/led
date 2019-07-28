<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IreportEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $ireport;
    public $pathToPDF;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($ireport,$pathToPDF)
     {
       $this->ireport = $ireport;
       $this->pathToPDF = $pathToPDF;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ireport')->attach($this->pathToPDF,['as' => 'nyau.pdf']);
    }
}
