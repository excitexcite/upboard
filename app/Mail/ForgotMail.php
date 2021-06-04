<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
   use Queueable, SerializesModels;

   private $user;
   private $newPassword;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct(User $user, string $newPassword)
   {
      $this->user = $user;
      $this->newPassword = $newPassword;
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build()
   {
      return $this->markdown('mails.forgot', [
         'user' => $this->user,
         'newPassword' => $this->newPassword,
      ]);
   }
}
