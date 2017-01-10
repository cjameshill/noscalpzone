<?php

namespace App\Traits;


trait WithProfiles
{

    public function twitterHandle() {
        return $this->social()->where('type', 'twitter')->first()->handle;
    }

    public function instagramHandle() {
        return $this->social()->where('type', 'instagram')->first()->handle;
    }


}