<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveUsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // Checks for logged in users
        $this->middleware('check.user.active');
    }

    function welcome() {
        return view('activeusers.welcome');
    }
}
