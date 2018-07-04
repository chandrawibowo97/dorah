<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Model\Event;
use App\Model\Post;

class AdminController extends Controller
{
    public function admin()
    {
        $route = Route::currentRouteName();
        $events = Event::orderBy('created_at', 'desc')->take(12)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(12)->get();
        $data = array(
            'title' => 'Admin Page',
            'route' => $route,
            'events' => $events,
            'posts' => $posts
            
        );

        return view('admin.index')->with($data);
    }
}
