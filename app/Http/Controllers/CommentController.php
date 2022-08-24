<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           'comment'=>'required',
            'blog_id'=>'required|exists:blogs,id'
        ]);
        $comment = Comment::create([
            'user_id'=>auth()->id(),
            'blog_id'=>$request->blog_id,
            'comment'=>$request->comment,
        ]);
        return redirect()->back()->with('success-alert2', 'Thank you for you comments.');
    }

    public function remove(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success-alert2', 'Remove successfully.');
    }
}
