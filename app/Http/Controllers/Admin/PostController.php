<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPostForm()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.post.create', compact('categories'));
    }

    public function postStore(Request $request)
    {
        $this->validate($request, [
         'category_id' => 'required|integer',
         'title'       => 'required|string',
         'description' => 'required|string',
         'image'       => 'required',
        ]);
           
        if($request->file('image')){
            $imageName = time() . '.' .$request->image->extension();
            $request->image->move('post/',$imageName);
        }

        $post = new Post();
        $post->user_id = session()->get('adminId');
        $post->category_id = $request->category_id;
        $post->title       = $request->title;
        $post->slug       = str_replace(' ', '-', strtolower($request->title));
        $post->description = $request->description;
        $post->image       = $imageName;
        $post->save();
        return redirect()->back()->with('success', 'Post created.');
    }

    public function managePost()
    {
      $posts = Post::with('category')->orderBy('id', 'desc')->get();
        return view('backend.post.list', compact('posts'));
    }

    public function editPost($id)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
         $post = Post::find($id);
        return view('backend.post.edit', compact('categories', 'post'));
    }

    
     public function updatePost(Request $request, $id)
     {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title'       => 'required|string',
            'description' => 'required|string',

           ]);

           $post = Post::find($id);

           if($request->file('image')){
            if($post->image && file_exists('post/'.$post->image)){
                unlink('post/'.$post->image);
            }
            $imageName = time() . '.' .$request->image->extension();
            $request->image->move('post/',$imageName);
            $post->image = $imageName;
        }
           $post->user_id = session()->get('adminId');
           $post->category_id = $request->category_id;
           $post->title       = $request->title;
           $post->slug       = str_replace(' ', '-', strtolower($request->title));
           $post->description = $request->description;
           $post->save();
           return redirect()->back()->with('success', 'Post updated.');
     }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted.');

    }


  
}
