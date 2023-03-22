@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('posts.update', $post->id) }}">

                            {{-- Creates token --}}
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlTitle" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}" placeholder="[Required] Enter post title" required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlContent" class="form-label">Content</label>
                                <input type="text" class="form-control" id="content" name="content" value="{{ old('content') ?? $post->content }}" placeholder="[Required] Enter Content" required>
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlUrl" class="form-label">Image Url</label>
                                <input type="url" class="form-control" id="url" name="url" value="{{ old('url') ?? $post->url }}" placeholder="[Optional] Enter image Url">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlLink" class="form-label">External Web Link</label>
                                <input type="url" class="form-control" id="link" name="link" value="{{ old('link') ?? $post->link }}" placeholder="[Optional] Enter link to external web page">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    <a href="{{ route('posts.index') }}">Cancel</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
