<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Profile; // => ME, for page 99

class ProfileController extends Controller
{
    // => ME, added for page 134
    public function index()
    {

        $user = Auth::user();

    // => ME, added for page 134
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $posts = \App\Models\Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $postscount = \App\Models\Post::where('user_id', $user->id)->count();

        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
            'postscount' => $postscount
        ]);
    }

    // => ME, added for page 82
    public function create()
    {
        return view('createProfile');
    }
    // => ME, for page 113
    // => ME, added for page 133
    public function postCreate()
    {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => 'image',
        ]);

        // Load the existing profile
        $user = Auth::user();

        //this is empty and returning null
        $profile = Profile::where('user_id', $user->id)->first();
        if (empty($profile)) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        $profile->description = request('description');

        // Save the new profile pic... if there is one in the request()!
        if (request()->has('profilepic')) {
            $imagePath = request('profilepic')->store('uploads', 'public');
            $profile->image = $imagePath;
        }

        // Now, save it all into the database
        $updated = $profile->save();
        if ($updated) {
            return redirect('/profile');
        }
    }
    // => ME, for page 99
    /*    public function postCreate()
    {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => ['required', 'image'],
        ]);

        // store the image in uploads, under public
        // request(‘profilepic’) is like $_GET[‘profilepic’]
        $imagePath = request('profilepic')->store('uploads', 'public');

        // create a new profile, and save it
        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->description = request('description');
        $profile->image = $imagePath;
        $saved = $profile->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }
    } */
    // => ME, for page 99
    // => ME, for page 113

    // => ME, for page 109
    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('createProfile', [
            'profile' => $profile
        ]);
    }
    // => ME, for page 109

    // => ME, for page 112
    public function update()
    {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => 'image',
        ]);

        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
    }
    // => ME, for page 112
}
