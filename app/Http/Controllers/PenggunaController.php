<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_dusun = $user->id_dusun;

            switch ($id_dusun) {
                case 1:
                    return redirect()->route('dashboard.pandean');
                case 2:
                    return redirect()->route('dashboard.pandeankidul');
                case 3:
                    return redirect()->route('dashboard.sidadap');
                case 4:
                    return redirect()->route('dashboard.pandeanlor');
                case 5:
                    return redirect()->route('dashboard.dalangan');
                case 6:
                    return redirect()->route('dashboard.digulan');
                case 7:
                    return redirect()->route('dashboard.tanggulangin');
                case 8:
                    return redirect()->route('dashboard.wonolobo');
            }
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usernameEmpty = empty($request->username);
        $passwordEmpty = empty($request->password);

        if ($usernameEmpty && $passwordEmpty) {
            return redirect()->back()->withErrors([
                'username_password' => 'Mohon Isi Username dan Password'
            ]);
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $user = Pengguna::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'username' => 'Username Tidak Terdaftar'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors([
                'password' => 'Password Salah'
            ]);
        }

        Auth::login($user);
        $id_dusun = $user->id_dusun;

        switch ($id_dusun) {
            case 1:
                return redirect()->route('dashboard.pandean');
            case 2:
                return redirect()->route('dashboard.pandeankidul');
            case 3:
                return redirect()->route('dashboard.sidadap');
            case 4:
                return redirect()->route('dashboard.pandeanlor');
            case 5:
                return redirect()->route('dashboard.dalangan');
            case 6:
                return redirect()->route('dashboard.digulan');
            case 7:
                return redirect()->route('dashboard.tanggulangin');
            case 8:
                return redirect()->route('dashboard.wonolobo');
            default:
                return redirect()->back()->withErrors([
                    'id_dusun' => 'Invalid ID Dusun'
                ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}