<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {

        $teachers = User::whereHas('role', function ($query) {
            $query->where('nama', 'guru');
        })->get();

        return inertia('Guru', [
            'teachers' => $teachers,
        ]);
    }

}
