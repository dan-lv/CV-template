<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    
}
