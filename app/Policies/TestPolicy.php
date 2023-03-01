<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Test;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return mixed
     */
    public function view(User $user, Test $test)
    {
        // Update $user authorization to view $test here.
        return true;
    }

    /**
     * Determine whether the user can create test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return mixed
     */
    public function create(User $user, Test $test)
    {
        // Update $user authorization to create $test here.
        return true;
    }

    /**
     * Determine whether the user can update the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return mixed
     */
    public function update(User $user, Test $test)
    {
        // Update $user authorization to update $test here.
        return true;
    }

    /**
     * Determine whether the user can delete the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return mixed
     */
    public function delete(User $user, Test $test)
    {
        // Update $user authorization to delete $test here.
        return true;
    }
}
