<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinApproval1 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$token)
    {
        $this->id  =  $id;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alvinrenard09@gmail.com')
                   ->view('finalapproval1')
                   ->subject('Employee Approval - VP Head of HRO')
                   ->with(
                    [
                        'id' => $this->id,
                        'token' => $this->token,
                    ]);
    }
}
