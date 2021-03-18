<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        $data = \request()->validate([
            'text' => 'required',
            'nested_comment_id' => ''
        ]);

        if(isset($data['nested_comment_id'])) {
            $nested_comment_id = $data['nested_comment_id'];
        } else {
            $nested_comment_id = null;
        }

        auth()->user()->comments()->create([
            'text' => $data['text'],
            'nested_comment_id' => $nested_comment_id,

        ]);

        return redirect('/');
    }
}
