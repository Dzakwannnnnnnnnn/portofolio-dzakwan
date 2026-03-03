<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireMeMail extends Mailable
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
   * Get the message envelope.
   *
   * @return \Illuminate\Mail\Mailables\Envelope
   */
  public function envelope()
  {
    return new Envelope(
      from: $this->details['email'],
      subject: 'Pesan Baru dari Portofolio - ' . $this->details['name'],
    );
  }

  /**
   * Get the message content definition.
   *
   * @return \Illuminate\Mail\Mailables\Content
   */
  public function content()
  {
    return new Content(
      view: 'emails.hire-me',
    );
  }
}