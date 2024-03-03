<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\m_role;
use App\Models\m_absensi;
use App\Models\m_pengumpulanLK;
use App\Models\m_kategori;

class HrdController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Hrd Dashboard'
        );
        return view('petinggi.subMenu.hrd.hrdHome', $data);
    }

    public function updateProfilSaya(Request $request, $id)
    {
        $request->validate([
            'nama_pekerja'      => 'required',
            'email'             => 'required|email',
            'password'          => 'required',
            'alamat_pekerja'    => 'required',
        ]);
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('petinggi.myProfile')->with('error', 'Profil tidak ditemukan.');
        }
        $hashedPassword = bcrypt($request->input('password'));

        $user->update([
            'nama_pekerja'      => $request->input('nama_pekerja'),
            'email'             => $request->input('email'),
            'password'          => $hashedPassword,
            'alamat_pekerja'    => $request->input('alamat_pekerja'),
        ]);

        return redirect()->route('petinggi.myProfile')->with('success', 'Data berhasil diperbarui.');
    }

    public function hrdStaff()
    {
        // $totalStaff = User::all()->count();
        // $Users = User::all();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalMarketing = User::where('role', 'staff marketing')->count();
        $Admin = User::where('role', 'admin')->get();
        $Marketing = User::where('role', 'staff marketing')->get();
        // $tugas = User::find($id);
        $data = array(
            'title' => 'Data Staff Admin-hrd'
        );
        return view(
            'petinggi.subMenu.hrd.hrdStaff',
            $data,
            [
                'Admin' => $Admin,
                'Marketing' => $Marketing,
                'totalAdmin' => $totalAdmin,
                'totalMarketing' => $totalMarketing,
            ]
        );
    }

    public function allStaff()
    {
        $users = User::where('role', '!=', 'hrd')
            ->where('role', '!=', 'supervisor admin')
            ->orWhereNull('role')
            ->paginate(8);

        $role = m_role::all();

        $data = array(
            'title' => 'Data Semua Staff',
            'users' => $users,
            'roles' => $role,
        );

        return view('petinggi.subMenu.hrd.controlAllStaff', $data);
    }

    public function updateHrd(Request $request, $id)
    {
        $request->validate([
            // Validasi input di sini sesuai kebutuhan Anda
        ]);

        // Ambil data user berdasarkan ID
        $user = User::find($id);

        // Mengupdate foto_user jika ada file yang diunggah
        if ($request->hasFile('foto_user')) {
            $namaFile = $request->file('foto_user')->storeAs('fotoUsers', uniqid() . '.' . $request->file('foto_user')->getClientOriginalExtension());
            $user->foto_user = $namaFile;
        }

        $user->fill([
            'no_pekerja'        => $request->input('no_pekerja'),
            'nama_pekerja'      => $request->input('nama_pekerja'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($request->input('password')), // Gunakan Hash::make untuk mengenkripsi kata sandi
            'alamat_pekerja'    => $request->input('alamat_pekerja'),
            'jobdesk_pekerja'   => $request->input('jobdesk_pekerja'),
            'role'              => $request->input('role'),
            'status'            => $request->input('status'),
        ]);

        // Gunakan transaksi database jika diperlukan
        // Misalnya, DB::transaction(function () use ($user) {
        //     $user->save();
        // });

        $user->save();

        return redirect()->route('petinggi.subMenu.hrd.controlAllStaff')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteHrd($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('petinggi.subMenu.hrd.controlAllStaff')->with('error', 'Data not found.');
        }

        if ($user->foto_user) {
            Storage::delete('fotoUsers/' . $user->foto_user);
        }

        $user->delete();
        return redirect()->route('petinggi.subMenu.hrd.controlAllStaff')->with('success', 'Data berhasil dihapus.');
    }
}
