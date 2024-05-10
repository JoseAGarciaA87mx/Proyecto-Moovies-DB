<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function author(User $user, User $auth_user)
    {
        return $user->id == $auth_user->id;
    }
}
