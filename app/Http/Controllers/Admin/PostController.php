<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $route = Route::currentRouteName();
        $posts = Post::all();

        $data = array(
            'title' => 'Admin - Blog',
            'route' => $route,
            'posts' => $posts
        );

        return view('blog.list')->with($data);
    }

    public function add(Request $request)
    {
        $route = Route::currentRouteName();
        $currTime = new \DateTime;

        $requestParameter = $request->request->all();
        $post = new Post;
        $post->title = $requestParameter['title'];
        $post->body = $requestParameter['body'];
        $post->created_at = $currTime;
        $post->updated_at = $currTime;

        $post->save();

        return view('admin_post');
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin_post');
    }

    public function edit(Request $request, $id)
    {
        $route = Route::currentRouteName();
        $post = Post::find($id);

        $data = array(
            'title' => 'Blog - Dorah',
            'route' => $route,
            'post' => $post
        );

        if ($request->isMethod('put')) {
            $requestParameter = $request->request->all();

            $post->title = $requestParameter['title'];
            $post->body = $requestParameter['body'];
            $post->updated_at = new \DateTime;

            return view('admin_post');
        }

        return view('blog.edit')->with($data);
    }
}
