<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\invites;

use Auth;
use App\User;



class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invites $invites)
    {
      $this->invites = $invites;
    }

    public $invites;
     public $inviter;

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('view.name');
    // }
    public function build()
{

    return $this->from('mbuguapaul812@gmail.com')
                ->view('emails.invite');
}
}
