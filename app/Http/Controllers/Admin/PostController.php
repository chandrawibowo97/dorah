<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $route = Route::currentRouteName();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        $data = array(
            'title' => 'Admin - Blog',
            'route' => $route,
            'posts' => $posts
        );

        return view('admin.blog.index')->with($data);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                'picture' => 'image|max:1999'
            ]);

            // handle image upload
            if($request->hasFile('picture')) {
                //get filename with extension
                $filenameWithExt = $request->file('picture')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('picture')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('picture')->storeAs('public/post-images', $filenameToStore);
            }

            $currTime = new \DateTime;

            $requestParameter = $request->request->all();
            $post = new Post;
            $post->title = $requestParameter['title'];
            $post->body = $requestParameter['body'];
            if($request->hasFile('picture')) {
                $post->cover_image = $filenameToStore;
            }
            $post->created_at = $currTime;
            $post->updated_at = $currTime;

            $post->save();
            return redirect()->route('admin_post');
        }

        $route = Route::currentRouteName();
        $data = array(
            'title' => 'Admin - Add Blog Post',
            'route' => $route
        );
        return view('admin.blog.add')->with($data);
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        if($post->cover_image != NULL){
            Storage::delete('public/post-images/'.$post->cover_image);
        }
        $post->delete();
        return redirect()->route('admin_post');
    }

    public function edit(Request $request, $id)
    {
        $route = Route::currentRouteName();
        $post = Post::find($id);

        $data = array(
            'title' => 'Admin - Edit Post',
            'route' => $route,
            'post' => $post
        );

        if ($request->isMethod('put')) {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                'picture' => 'image|max:1999'
            ]);

            // handle image upload
            if($request->hasFile('picture')) {
                //get filename with extension
                $filenameWithExt = $request->file('picture')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('picture')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('picture')->storeAs('public/post-images', $filenameToStore);
                
                // delete old picture
                if($post->cover_image != NULL){
                    Storage::delete('public/post-images/'.$post->cover_image);
                }
            }

            $requestParameter = $request->request->all();

            $post->title = $requestParameter['title'];
            $post->body = $requestParameter['body'];
            if($request->hasFile('picture')) {
                $post->cover_image = $filenameToStore;
            }
            $post->updated_at = new \DateTime;
            $post->save();
            return redirect()->route('admin_post');
        }

        return view('admin.blog.edit')->with($data);
    }
}
