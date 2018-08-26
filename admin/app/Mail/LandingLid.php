<?php

namespace Latina\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Latina\Lid;

class LandingLid extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    /**
     * Create a new message instance.
     *
     * @param Lid $lid
     */
    public function __construct(array $lid)
    {
        $this->data = $lid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('email.lid');

        $this->subject('Заявка от лендинга');
        $this->withSwiftMessage(function ($message){
           $message->getHeaders()
               ->addTextHeader('Custom-Header', 'HeaderValue');
        });

        return $this;
    }
}
