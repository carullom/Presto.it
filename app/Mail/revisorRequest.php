<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class revisorRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $c;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($c)
    {
        $this->c = $c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('amministrazione@presto.it')->view('contact.revisorRequestMail');
    }
}
