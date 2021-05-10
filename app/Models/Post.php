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

    /**
     *
     */
    public function updatePost($data)
    {
        $data['title'] = htmlspecialchars($data['title']);
        $data['content'] = htmlspecialchars($data['content']);

        $result =  $this->where('id', '=', $data['id'])
                        ->update([
                            'title'   => $data['title'],
                            'content' => $data['content'],
                            'publish' => $data['publish'],
                        ]);
        return $result;
    }

    public function addPost($data)
    {
        $data['title'] = htmlspecialchars($data['title']);
        $data['content'] = htmlspecialchars($data['content']);
        
        //'uid_add' => $data['uid_add'],
        $result = $this->insertGetId([
                    'title'   => $data['title'],
                    'content' => $data['content'],
                    'publish' => $data['publish'],
                    'uid_add' => $data['uid_add'],

                ]);
        return $result;
    }
}
