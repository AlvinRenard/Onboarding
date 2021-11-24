<?php

namespace App\Mail;
use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DownloadFile;
class UserContractEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($id,$token,$data)
    {       
        $this->id  =  $id;
        $this->token = $token;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['employee']= Employee::with('files')->find($this->id);
        $filename =DownloadFile::where('EmployeeId', $this->id)->first();
        return $this->from('alvinrenard09@gmail.com')
                   ->view('empcontractemail')
                   ->subject('Your First day at Indosat')
                   ->attach( public_path()."/".$filename->idcard, [
                    'as' => 'Idcard.pdf',
                    'mime' => 'application/pdf',
               ])
                   ->with(
                    [
                        'id' => $this->id,
                        'token' => $this->token,
                        'data'=> $this->data,
                    ]);
    }
}
