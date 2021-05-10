<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use App\Http\Requests\AddCommentRequest;

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
    public function addComment(AddCommentRequest $request)
    {
        $data = $request->all();
        $data['id_user'] = intval(auth()->user()->id);

        $result = $this->Comment->addComment($data);
        return true;
    }
}
