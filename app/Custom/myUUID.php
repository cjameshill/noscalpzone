<?php

namespace App\Custom;

use Faker\Provider\Uuid;

class myUUID
{

    public static function getUUID($limit = null) {
        if($limit != null){
            return substr(Uuid::uuid(), 0, $limit);
        }

        return Uuid::uuid();

    }

}