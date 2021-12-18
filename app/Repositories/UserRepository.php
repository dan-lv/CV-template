<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    
}
