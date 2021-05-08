<?php

namespace App\Models;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class Post extends PostRepository
{
    /**
     * @param $idPost
     */
    public function deletePost($idPost)
    {
        $result = $this->where('id', '=', $idPost)->delete();

        return $result;
    }
}
