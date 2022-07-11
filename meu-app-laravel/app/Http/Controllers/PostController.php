<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        return view('posts.index', compact('posts'));

    }
}
