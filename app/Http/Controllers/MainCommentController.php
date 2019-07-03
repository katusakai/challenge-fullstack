<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainCommentController extends Controller
{
    public function store()
    {
        $data = \request()->validate([
            'text' => 'required'
        ]);

        auth()->user()->comments()->create([
            'text' => $data['text']
        ]);

        return redirect(route('home'));
    }
}
