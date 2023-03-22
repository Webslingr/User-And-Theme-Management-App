@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('users.create') }}">Create New Admin User</a>

                        <table class="table">
                            <thead>
                            <tr>
{{--                                <th scope="col">#</th>--}}
                                <th scope="col">Users</th>
                                <th scope="col">Roles</th>
                                <th scope="col" colspan="2">Actions</th>
{{--                                <th scope="col">Roles</th>--}}

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
{{--                                    @foreach($user->roles as $role)--}}

                                    <td style="width:100%;">{{$user->name}}</td>
                                        @foreach($user->roles as $role)
                                    <td>{{$role->name}}</td>
                                        @endforeach
{{--                                    <td>--}}
{{--                                        <ul>--}}
{{--                                            @foreach($user->roles as $role)--}}
{{--                                                <li>{{$user->name}}</li>--}}
{{--                                                <li>{{ $role->name }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    <td style="width:100%;">{{$role->id}}</td>--}}
                                    {{--                                    <td>{{$role->name}}</td>--}}
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    </td>
                                    <td>
{{--                                        <a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">Delete</a>--}}
                                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>

{{--                                    @endforeach--}}
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
