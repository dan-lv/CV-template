<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    
}
