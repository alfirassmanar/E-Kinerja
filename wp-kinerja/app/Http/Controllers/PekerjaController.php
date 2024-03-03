<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\Post;

class PekerjaController extends Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Login Sistem'
        );
        return view('login', $data);
        // return view('home', $data);
    }

    public function indexSuper()
    {
        $data = array(
            'title' => 'Supervisor Dashboard'
        );
        return view('petinggi.superHome', $data);
        // return view('home', $data);
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->status == 1) {
                if ($user->role == 'supervisor admin') {
                    return redirect()->route('petinggi.superHome');
                } elseif ($user->role == 'hrd') {
                    return redirect()->route('petinggi.subMenu.hrd.hrdHome');
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error-status', 'Akun Anda tidak aktif.');
            }
        } else {
            return redirect()->route('login')->with('error-login', 'Login gagal. Pastikan email dan password benar.');
        }
    }

    public function logout_proses()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function registrasi_proses(Request $request)
    {
        $tanggalHariIni = date('dmY');
        $nomorPekerjaTerakhir = User::max('no_pekerja');
        $nomorPekerjaTerakhir = $nomorPekerjaTerakhir ? $nomorPekerjaTerakhir : 0;
        $angkaAcak = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $noPekerjaBaru = $tanggalHariIni . $angkaAcak;

        $fotoUser = $request->file('foto_user');
        $path = $fotoUser->storeAs('fotoUsers', uniqid() . '.' . $fotoUser->getClientOriginalExtension());

        User::create([
            'no_pekerja'        => $noPekerjaBaru,
            'nama_pekerja'      => $request->nama_pekerja,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'alamat_pekerja'    => $request->alamat_pekerja,
            'pendidikan'        => $request->pendidikan,
            'pekerja_masuk'     => $request->pekerja_masuk,
            'foto_user'         => $path, // Simpan path foto_user ke dalam database
        ]);

        return redirect('/login')->with('success-registrasi', 'Anda telah melakukan registrasi');
    }
}
