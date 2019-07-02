<?php

namespace App\Http\Controllers;

use App\Aggregators\Comments;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = new Comments;
        dump($comments->sortedComments[0]->nestedComments[0]->user->name);
        return view('home', compact('comments'));
    }
}
