@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Admin User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('users.update', $user->id) }}">

                            {{-- Creates token --}}
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}" placeholder="Enter name here">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" placeholder="Enter email here">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlPassword1" class="form-label">Enter New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password here">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="exampleFormControlrole1" class="form-label">Roles</label> <br/>
                            @foreach($roles as $role)
{{--                                {{ dd($user->roles->contains($role)) }}--}}
                                <div class="form-check">
                                    @if(old('role_id'))
                                        <input {{ is_array(old('role_id')) && in_array($role->id, old('role_id')) ? 'checked' : '' }}
                                            class="form-check-input"
                                            type="checkbox"
{{--                                            id="role_id"--}}
                                            id=""
                                            name="role_id[]"
                                            value="{{ $role->id }}">
{{--                                        {{$role->name}} <br/>--}}
                                    @else
                                        <input {{ $user->roles->contains($role) ? 'checked' : '' }}
                                               class="form-check-input"
                                               type="checkbox"
                                               id=""
                                               name="role_id[]"
                                               value="{{ $role->id }}">
                                    @endif

                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $role->name }}
                                        </label>
                                </div>
                            @endforeach
                            <br/>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    <a href="{{ route('users.index') }}">Cancel</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
