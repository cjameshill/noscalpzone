<?php

namespace App\Tickets;

use Aws\CloudFront\UrlSigner;
use App\Ticket;

class TicketDistribution
{
    protected $ticket;

    public function __construct(Ticket $ticket) {
        $this->ticket = $ticket;

    }

    public function getSignedURL() {
        return UrlSigner::getSignedURL();
    }

    public function getDownloadLink() {
        return $this->ticket->downloads->first()->ticket_uri;
    }

}