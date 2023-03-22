{{--{{dd ($users)}}--}}
{{--{{dd($roles)}}--}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Admin User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('users.store') }}">

                            {{-- Creates token --}}
                            @csrf

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name here">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email here">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password here">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

{{--
                                <div class="mb-3">
                                    <label for="exampleFormControlrole1" class="form-label">Roles</label>
                                    <br/>
{{--                                    <input type="checkbox" id="role" name="role" value="1" > User Administration<br>--}}
{{--                                    <input type="checkbox" id="role" name="role" value="2" > Moderator<br>--}}
{{--                                    <input type="checkbox" id="role" name="role" value="3" > Theme Manager<br>--}}
{{--                            @foreach ($roles as $role)--}}
{{--                                    <input type="checkbox" id="role" name="role" value="{{$roles->name}}" {{ (is_array(old('roles')) && in_array($roles->id, old('roles'))) ? 'checked' : ''}}> {{$roles->name}}--}}
{{--                                    @error('password')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                            <label for="exampleFormControlrole1" class="form-label">Roles</label> <br/>
                            @foreach($roles as $role)
                                <input {{ is_array(old('role_id')) && in_array($role->id, old('role_id')) ? 'checked' : '' }} type="checkbox" id="role_id" name="role_id[]" value="{{$role->id}}"> {{$role->name}} <br/>
                            @endforeach
                            <br/>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('users.index') }}">Cancel</a>
                         </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
