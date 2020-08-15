<?php

namespace App\Tweets\Entities;

use App\User;
use Illuminate\Database\Eloquent\Collection;

class EntityDatabaseCollection extends Collection
{
    public function users()
    {
        return User::whereIn('username', $this->pluck('body_plain'))->get();
    }
}
