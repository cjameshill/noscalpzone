<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GetUserInfo
{
    use HandlesAuthorization;


    public function viewUser(User $user) {
        return auth()->user()->id == $user->id;
    }
}
