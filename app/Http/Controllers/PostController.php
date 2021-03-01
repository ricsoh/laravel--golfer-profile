<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // => ME, about page retrive all blogs from DB
    public function index()
    {
        $posts = \App\Models\Post::all();

        return view('about_us', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // => ME, for page 127
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'caption' => 'required',
            'postpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $profile = new Post();
        $imagePath = request('postpic')->store('uploads', 'public');

        $profile->user_id = $user->id;
        $profile->caption = request('caption');
        $profile->image = $imagePath;
        $saved = $profile->save();

        if ($saved) {
            return redirect('/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postID)
    {
        $post = Post::where('id', $postID)->first();
        $user = Auth::user();

        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // => ME, edit post
    public function update(Request $request, $postID)
    {
        $data = request()->validate([
            'caption' => 'required',
            'postpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $post = Post::find($postID); // This is for updating selected ID
        $imagePath = request('postpic')->store('uploads', 'public');

        $post->caption = request('caption');
        $post->image = $imagePath;
        $saved = $post->save();

        if ($saved) {
            return redirect('/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // => ME, delete post
    public function destroy($postID)
    {
        $delete = Post::where('id', $postID)->first();
        $destinationPath = '/storage/uploads/';
        File::delete($destinationPath . $delete->Image);
        $deleted = Post::where('id', $postID)->delete();

        if ($deleted) {
            return redirect('/profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }
}
