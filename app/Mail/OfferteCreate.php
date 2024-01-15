<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
 
class OfferteCreate extends Mailable
{
    use Queueable, SerializesModels;
 
    public $offerDate;
    public $offerCosts;
    public $companyName;
    public $userEmail;
    public $productNames;
 
    /**
     * Create a new message instance.
     */
    public function __construct($offerDate, $offerCosts, $companyName, $userEmail, $productNames)
    {
        $this->offerDate = $offerDate;
        $this->offerCosts = $offerCosts;
        $this->companyName = $companyName;
        $this->userEmail = $userEmail;
        $this->productNames = $productNames;
    }
 
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Je offerte',
            from: 'Sales@barrocintens.nl'
        );
    }
 
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $content = new Content(view: 'emails.offerte-create');    
        return $content->with([
            'offerDate' => $this->offerDate,
            'offerCosts' => $this->offerCosts,
            'companyName' => $this->companyName,
            'userEmail' => $this->userEmail,
            'productNames' => $this->productNames,
        ]);
    }
   
 
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}