@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Themes Dashboard') }}</div>



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary" href="{{ route('themes.create') }}">Create New Theme</a>



                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col">Name</th>
                                <th class="col" colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($themes as $theme)
                                <tr>
                                    <td>{{$theme->name}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('themes.show', $theme->id) }}">Details</a>
                                    </td>
                                    <td>
                                        @if($theme->id !== 1)
                                            <a class="btn btn-warning" href="{{ route('themes.edit', $theme->id) }}">Edit</a>
                                        @endif
                                    </td>
                                    @if($theme->id !== 1)
                                        <td>
                                            <form method="post" action="{{ route('themes.destroy', $theme->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
