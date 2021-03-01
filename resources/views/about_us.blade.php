<!-- about_us.blade.php -->

<!-- => ME, for page 104 -->
@extends('layouts.app')

@section('content')

<div class=" relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 style="text-align: center; font-size: 60px;">
                <strong>About Us</strong>
            </h1>
        </div>
        <div>
            <h4 style="text-align: center;">
                <b>"The Golfer's Profile" – a site focused on allowing users to store a collection of their favourite golfer's name and picture.</b>
                <br><br>
                <!-- => ME, back to profile page if log in else back to welcome page -->
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/profile') }}" class="text-sm text-gray-700 underline"><u>Back</u></a>
                @else
                <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Back</a>
                @endif
                @endif
            </h4>
        </div>
    </div>
</div>

<!-- => ME, slide show -->
<div class="slideshow-container">
    @foreach($posts as $post)
    <div class="mySlides fade container">
        <img src="/storage/{{$post->image}}" class="w-100" width="500" height="300">
        <div class="text-block">{{$post->caption}}</div>
    </div>
    @endforeach
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <p style="text-align:center;"><small>Click on the <b>' < '</b> or <b>'> '</b> to view slideshow</small></p>
    <!-- => ME, for image slide -->
    <script>
        showSlides(slideIndex);
    </script>
</div>

@endsection
