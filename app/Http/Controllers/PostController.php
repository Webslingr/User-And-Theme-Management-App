<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
//
//        $users = User::all();
////        $users = User::where('id')->with('created_by')->get();
////        $users = User::find(1)->get();
////          $users = User::posts()->get();
//
//        return view('posts.index', compact(['posts', 'users']));

//        $posts = Post::orderBy('created_by')->with('users')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'id' => User::all(),
        ],  compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate our submitted data
        $request->validate([
            'title' => ['required', 'max:100'],
            'content' => ['required', 'max:100'],
            'url' => ['max:200'],
            'link' => ['max:50'],
        ]);

//        $user = User::all();

//    dd($request->all()['content']);
        //Save the submitted data to the db using our model
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->all()['content'];
        $post->url = $request->url;
        $post->link = $request->link;
        $post->created_by = Auth::id();
        $post->save(); //Performs an INSERT in the database


        return redirect(route('posts.index'))->with('status', 'Post Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Validate our submitted data
        $request->validate([
            'title' => ['required', 'max:100'],
            'content' => ['required', 'max:100'],
            'url' => ['max:200'],
            'link' => ['max:50'],
        ]);

        $post->title = $request->title;
        $post->content = $request->all()['content'];
        $post->url = $request->url;
        $post->link = $request->link;
        $post->created_by = Auth::id();
        $post->save(); //Performs an INSERT in the database


        return redirect(route('posts.index'))->with('status', 'Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'))->with('status', 'Post Deleted');
    }
}
