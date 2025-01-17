<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $url = $request->getHost();
        $username = htmlspecialchars($request->username);
        $password = $request->password;

        $validate = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $kec = Kecamatan::where('web_kec', $url)->orwhere('web_alternatif', $url)->first();
        $lokasi = $kec->id;

        $user = User::where([['uname', $username], ['lokasi', $lokasi]])->first();
        if ($user) {
            if ($password === $user->pass) {
                if (auth()->loginUsingId($user->id)) {
                    $request->session()->put('nama_lembaga', str_replace('DBM ', '', $kec->nama_lembaga_sort));
                    $request->session()->put('nama', auth()->user()->namadepan . ' ' . auth()->user()->namabelakang);
                    $request->session()->put('foto', auth()->user()->foto);

                    return redirect('/dashboard');
                }
            }
        }

        return redirect()->back();
    }
}
