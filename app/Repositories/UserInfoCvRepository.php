<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class UserInfoCvRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\UserInfoCv::class;
    }

    
}
