<?php

namespace App\Http\Controllers;

use App\Ticket;
use Aws\CloudFront\CloudFrontClient;
use Illuminate\Http\Request;

class TicketDistributionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }


    protected function download(Ticket $ticket){

        $cloudfront = new CloudFrontClient([
            'region'  => 'us-east-2',
            'version' => 'latest'
        ]);

        $streamHostUrl = 'https://tickets.noscalpzone.com';
        $resourceKey = 'QJN1AVjWeUL5z5mdHkaAffcvD3SQlyvzhgHqmhZ5.pdf';
        $expires = time() + 300;


        return $cloudfront->getSignedUrl([
            'url'         => $streamHostUrl . '/' . $resourceKey,
            'expires'     => $expires,
            'private_key' => '/Users/Chris/Dropbox/WEB/PROJECTS/NOSCALPZONE/noscalpzoneweb/pk-APKAIRXASVGXMGUZROMA.pem',
            'key_pair_id' => env('AWS_CLOUDFRONT_ACCESS_KEY')
        ]);
    }

    protected function getDownloadLinks(Ticket $ticket) {
        $set = $ticket->withSetsOfTicketsWithDownloads()->get();

        $links = $set->first()->tickets->map(function ($t){
            return $t->download->ticket_uri;
        });

        return $links->unique()->first();
    }



}
