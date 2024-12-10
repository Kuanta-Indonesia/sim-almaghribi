<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return inertia('Login');
    }
}
