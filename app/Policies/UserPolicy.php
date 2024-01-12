<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function hasPermission(User $user, string $permissionName)
    {
        // Assuming a many-to-many relationship between User and Permission through Role
        return $user->roles->flatMap(function ($role) {
            return $role->permissions;
        })->pluck('name')->contains($permissionName);
    }
}
