<?php

namespace App\Traits;


use App\Type;

trait ModelScopes
{

    public function hasType($type) {
        return $this->whereHas('type', function ($q) use ($type){
            $q->where('name', $type);
        });
    }

    public function getTypeName() {
        return $this->type()->first()->name;
    }

    public function addType($type) {

        if(is_string($type)){
            $t = Type::where('name', $type)->first();
            return $this->type()->attach($t);
        } else {
            return $this->type()->attach($type);
        }


    }

}