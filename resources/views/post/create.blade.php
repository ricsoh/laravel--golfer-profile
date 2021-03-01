<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="postpic">Golfer's picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="caption">Golfer's name</label>
                        <input class="form-control" type="text" name="caption" id="caption" required>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Post!</button><br>
                    </div>
                </form>
                <a href="{{ url('/profile') }}" class="text-sm text-gray-700 underline">Back</a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
