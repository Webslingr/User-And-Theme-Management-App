{{--{{dd($posts)}}--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to the Media Feed!') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user())
                            <a class="btn btn-primary" href="{{ route('posts.create') }}"> Create New Post </a>
                        @endif

                        <br/>
                        <br/>

                        @foreach($posts as $post)
                        <div class="card p-3">
                            <p>{{$post->created_at}} by {{$post->user->name}}</p>
                            <h1>{{$post->title}}</h1>
                            <img src="{{$post->url}}" alt="image">
                            <br/>
                            <p>{{$post->content}}</p>
                            <a href="{{$post->link}}">Show More</a>
                            <br/>

                            @if (Auth::user())
                                <div class="d-flex justify-content-evenly" style="width: 30%;">
                                    <a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            @endif

                            <br/>
                        </div>
                        <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
