<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    //Receive the data from controller, and pass to the view
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->markdown('emails.leave_approve')->subject('Leave Approved');
    }

}

?>
