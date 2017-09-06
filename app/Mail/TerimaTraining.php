<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Training;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TerimaTraining extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user= $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('Konfirmasi Pendaftaran Training')
                  ->with('users', $this->user)
                  ->view('emails.accept');
    }

}
