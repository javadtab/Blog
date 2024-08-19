<?php

namespace Modules\Post\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//////
use App\Models\Comment;
//use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
      $request->validate([
      'body'=>'required',
       ]);
       $input = $request->all();
       $input['user_id'] = auth()->user()->id;
       Comment::create($input);
       return back();

    }
}
