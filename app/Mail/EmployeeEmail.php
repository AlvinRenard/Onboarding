<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alvinrenard09@gmail.com')
                   ->view('success');
                //    ->with(
                //     [
                //         'nama' => 'Diki Alfarabi Hadi',
                //         'website' => 'www.malasngoding.com',
                //     ]);
    }
}
