<!-- show.blade.php -->

<!-- => ME, for page 138 -->
@extends('layouts.app')

<style>
    .bottom-centered {
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 container">
            <img src="/storage/{{ $post->image }}" class="w-100">
            <div class="text-block">{{$post->caption}}</div>
        </div>
        <div class="col-4">
            <h2>{{$user->name}}</h2>
            <hr>
            <!-- for edit button -->
            <form action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data" method="post">
                <label for="postpic">Golfer's picture</label>
                <input type="file" name="postpic" id="postpic" required><br><br>
                <label for="caption">Golfer's name</label>
                <input class="form-control" type="text" name="caption" id="caption"}} value="{{$post->caption}}" required><br>
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary" style="width:150px">Edit post</button>
            </form>
            <!-- for edit button -->
            <hr>
            <!-- for delet button -->
            <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width:150px">Delete post</button>
                <!-- for back button -->
                &nbsp<a href="{{ url('/profile') }}" class="text-sm text-gray-700 underline">Back</a>
                <!-- for back button -->
            </form>
            <!-- for delet button -->
            <hr>
        </div>
    </div>
</div>
@endsection
