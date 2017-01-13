<?php

namespace App\Traits;


trait ModelScopes
{

    public function hasTag($tag) {
        return $this->whereHas('tags', function ($q) use ($tag){
            $q->where('name', $tag);
        });
    }


}