<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $table = 'post_comments';

	public function addComment($data)
    {
        //'uid_add' => $data['uid_add'],
        $result = $this->insertGetId([
                    'id_post' => $data['id_post'],
                    'id_user' => $data['id_user'],
                    'comment' => $data['comment'],

                ]);
        return $result;
    }

    public function getCommentsOnPost($idPost)
    {
    	$columns = ['post_comments.id', 'id_post', 'id_user', 'comment', 'post_comments.created_at', 'users.name'];

    	$data = $this->select($columns)
                     ->where('id_post', '=', $idPost)
                     ->join('users', 'users.id', '=', 'post_comments.id_user')
                     ->get()
                     ->toArray();

        return $data;
    }
}
