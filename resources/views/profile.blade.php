<!-- profile.blade.php -->

<!-- => ME, for page 104 -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image }}">
                        </div>
                        <div class="col-md-9">
                            <h3>{{ $user->name }}</h3>
                            <!-- ME, for page 135 -->
                            <span><strong>{{ $postscount }}</strong> posts</span>
                            <!-- <span><strong>0</strong> posts</span> -->
                            <!-- ME, for page 135 -->

                            <!-- => ME, for page 116 -->
                            @if (empty($profile->description))

                            <div class="pt-3"><a href="/profile/edit">Add a description to your profile!</a></div>

                            @else:
                            <div class="pt-3">{{$profile->description}}</div>
                            <!-- => ME, for page 115 -->
                            <div class="pt-3"><a href="/profile/edit">Edit profile</a></div>
                            <!-- => ME, for page 115 -->
                            @endif
                            <!-- => ME, for page 116 -->
                        </div>
                        <!-- ME, for page 136 -->
                        <div class="row pt-5">
                            @foreach($posts as $post)
                            <div class="col-4 mb-5">
                                <a href="/post/{{$post->id}}">
                                    <img src="/storage/{{$post->image}}" class="w-100">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- ME, for page 136 -->
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
<!-- => ME, for page 104 -->
