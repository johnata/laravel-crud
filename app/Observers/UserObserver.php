<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Models\User;

class UserObserver
{
    public function creating(User $task)
    {
        $task->uuid = Str::uuid();
    }
}
