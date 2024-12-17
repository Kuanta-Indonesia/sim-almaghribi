<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return inertia('Login');
    }
    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Login gagal, periksa kembali email atau password',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|unique:users|email|max:100',
            'password' => 'required|min:5',
            'kode' => 'required|string|max:100',
            'role_id' => 'required|max:1',
            'no_hp' => 'required|string|max:13',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kode' => $request->kode,
            'role_id' => $request->role_id,
            'no_hp' => $request->no_hp,
        ]);
    }
     public function indexEditProfile()
    {
        return inertia('Profile', [
            'user' => Auth::user()->load('role'),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $user->nama  = $request->input('nama');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
