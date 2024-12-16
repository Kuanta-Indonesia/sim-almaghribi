<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = User::where('role_id', 6)->get();

        return inertia('Guru', [
            'teachers' => $teachers,
        ]);
    }

}
