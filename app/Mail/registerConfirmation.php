<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class registerConfirmation extends Mailable
{
 use Queueable, SerializesModels;
 public $data;
 public function __construct($data)
 {
 $this->data = $data;
 }
 public function build()
 {
 return $this->subject("Register mail")
 ->view('emails.registermail');
 }
}
