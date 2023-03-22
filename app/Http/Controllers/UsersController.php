<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('check.user.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Retrieve all users data
//        $users = User::orderBy('name')->get();
        $users = User::orderBy('name')->get();
//        dd($users);
//        $roles = Role::find(1)->roles()->get();
//        $roles = Role::user()->get();

//        dd($roles);
//        return view('users.index', compact(['users', 'roles']));
        return view('users.index', compact('users')); // looks for folder users and filename index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
//        return view('users.create', compact('roles'));

        return view('users.create', [
            'id' => Role::all(),
        ],  compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);

        //Validate our submitted data
        $request->validate([
           'title' => ['required', 'max:100'],
           'content' => ['required','unique:users', 'max:100'],
           'password' => ['required','unique:users', 'max:100']
        ]);

        //Save the submitted data to the db using our model
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user['password'] =  Hash::make($user['password']);
//        $user->created_by = Auth::id();
//        $roles['role'] = $user['role'];
//        $user->$roles['id'] = $user->'role';
//        $user->password = $request->password;
        $user->save(); //Performs an INSERT in the database

        //Store ids in the pivot table
        $user->roles()->sync($request->role_id);

        return redirect(route('users.index'))->with('status', 'Admin User Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect(route('users.index'))->with('status', 'Get bamboozled!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
//        dd($users);
//        return view("users.edit")->with("users", $users);
        $roles = Role::orderBy('name')->get();
//        $user = User::orderBy('name')->get();
//        return view('users.edit', compact('user'));
        return view('users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Validate our submitted data
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
            'password' => ['required', 'max:100']
        ]);

        //Saves the changes
        $user->name = $request->name;
        $user->email = $request->email;
//        $user->password = $request->password;
        $user['password'] =  Hash::make($user['password']);
        $user->save(); //Performs a sql UPDATE in the database

        return redirect(route('users.index'))->with('status', 'Admin User Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))->with('status', 'Admin User Deleted');

    }
}
