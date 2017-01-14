<?php

namespace App\Traits;


trait ModelScopes
{

    public function hasType($type) {
        return $this->whereHas('type', function ($q) use ($type){
            $q->where('name', $type);
        });
    }


}