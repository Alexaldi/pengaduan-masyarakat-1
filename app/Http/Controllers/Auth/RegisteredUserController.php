<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|digits_between:11,12|unique:users,phone',
            'password' => 'required|string|confirmed|min:8',
            
        ], [
        'nik.required' => 'NIK must consist of 16 digits',
        'name.required' => 'Nama tidak boleh kosong.',
        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah ada.',
        'phone.required' => 'Phone numbers must consist of 11 to 12 digits',
        'password.required' => 'Password tidak boleh kosong.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'password.min' => 'Password minimal 8 karakter.',
        ]);

        Auth::login($user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            
        ]));

        event(new Registered($user));

        Alert::success('Berhasil', 'Register Berhasil!');
        return redirect(RouteServiceProvider::HOME);
    }
}
