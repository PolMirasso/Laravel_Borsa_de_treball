<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //   return $this->subject($this->details['subject'])->view('email.OfferRecived');

        if ($this->details['fileName'] != "") {
            $file = new \SplFileInfo($this->details['fileRoute']);

            return $this->subject($this->details['subject'])
                ->view('email.OfferRecived')
                ->attach($file->getRealPath(), [
                    'as' => $this->details['fileName'],
                    'mime' => 'application/pdf'
                ]);
        } else {
            return $this->subject($this->details['subject'])
                ->view('email.OfferRecived');
        }
    }
}
