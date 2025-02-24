<?php
namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable {
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactMessage $contact) {
        $this->contact = $contact;
    }

    public function build() {
        return $this->subject('New Contact Message')
                    ->view('emails.contact_message');
    }
}
