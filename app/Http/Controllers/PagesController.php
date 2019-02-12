<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Post;
use Illuminate\Support\Facades\Storage;



class PagesController extends Controller
{
    public function home()
    {
        $tasks = Task::all();
        $posts = Post::all();

        return view('welcome', compact('tasks', 'posts'));
    }


}
