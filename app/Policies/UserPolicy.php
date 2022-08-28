<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        if ($user->is_accepted == '1'){
            return \Illuminate\Auth\Access\Response::allow();
        }
        return \Illuminate\Auth\Access\Response::deny();
    }


    public function save(User $user, User $model)
    {
        if (auth()->user()->role == 'Golden User') return \Illuminate\Auth\Access\Response::allow();

        return \Illuminate\Auth\Access\Response::deny('You haven\'t access to save a post!!');

    }


    public function comment(User $user, User $model)
    {
        if (auth()->user()->role == 'Normal User') return \Illuminate\Auth\Access\Response::deny('You haven\'t access to post comments!!');

        return \Illuminate\Auth\Access\Response::allow();

    }
}
