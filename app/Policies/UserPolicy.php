<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function create(User $user): bool
    {
        return $user->role === 'gerente';
    }

    public function viewDashboard(User $user): bool
    {
        return $user->role === 'gerente';
    }

    // En UserPolicy o una Gate
    public function verDashboardAdmin(User $user)
    {
        return $user->role === 'gerente';
    }
}