<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function getPostByUserAndPostId($userId, $postId)
    {
        return $this->model->where('user_id', $userId)->where('id', $postId)->first();
    }
    
}
