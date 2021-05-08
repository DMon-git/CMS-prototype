<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

	private $Comment;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Comment = new Comment();
    }

    /**
     * 
     */
    public function addComment(Request $request)
    {
        //  валидация
        //$data = $request->all();
        $useid = intval(auth()->user()->id);
        $data['id_post'] = $request->input('id');
        $data['id_user'] = $useid;
        $data['comment'] = $request->input('comment');

        $result = $this->Comment->addComment($data);
        return $result;
    }
}
