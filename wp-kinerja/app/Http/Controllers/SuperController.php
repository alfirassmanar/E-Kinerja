<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\m_absensi;
use App\Models\m_pengumpulanLK;
use App\Models\m_role;
use App\Models\m_kategori;

class SuperController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Super Dashboard'
        );
        return view('petinggi.superHome', $data);
    }

    public function admStaff()
    {
        $totalAdmins = User::where('role', 'admin')->count();
        $Users = User::where('role', 'admin')->paginate(8);
        $role = m_role::all();

        // $tugas = User::find($id);
        $data = array(
            'title' => 'Data Staff Admin'
        );
        return view('petinggi.subMenu.admin.admStaff', $data, ['Users' => $Users, 'totalAdmins' => $totalAdmins, 'roles' => $role]);
    }

    public function updateStaff(Request $request, $id)
    {
        $request->validate([
            'no_pekerja'        => 'required',
            'nama_pekerja'      => 'required',
            'email'             => 'required|email',
            'password'          => 'required',
            'alamat_pekerja'    => 'required',
            'jobdesk_pekerja'   => 'required',
            'role'              => 'required',
            'status'            => 'required',
        ]);

        // Ambil data user berdasarkan ID
        $user = User::find($id);
        $hashedPassword = bcrypt($request->input('password'));

        // Mengupdate foto_user jika ada file yang diunggah
        // if ($request->hasFile('foto_user')) {
        //     $namaFile = $request->file('foto_user')->storeAs('fotoUsers', uniqid() . '.' . $request->file('foto_user')->getClientOriginalExtension());
        //     $user->update([
        //         'foto_user' => $namaFile,
        //     ]);
        // }
        if ($request->hasFile('foto_user')) {
            $namaFile = $request->file('foto_user')->storeAs('fotoUsers', uniqid() . '.' . $request->file('foto_user')->getClientOriginalExtension());
            $user->foto_user = $namaFile;
        }

        $user->update([
            'no_pekerja'        => $request->input('no_pekerja'),
            'nama_pekerja'      => $request->input('nama_pekerja'),
            'email'             => $request->input('email'),
            'password'          => $hashedPassword,
            'alamat_pekerja'    => $request->input('alamat_pekerja'),
            'jobdesk_pekerja'   => $request->input('jobdesk_pekerja'),
            'role'              => $request->input('role'),
            'status'            => $request->input('status'),
        ]);

        return redirect()->route('petinggi.subMenu.admin.admStaff')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteStaff($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('petinggi.subMenu.admin.admStaff')->with('error', 'Data not found.');
        }

        if ($user->foto_user) {
            Storage::delete('fotoUsers/' . $user->foto_user);
        }

        $user->delete();
        return redirect()->route('petinggi.subMenu.admin.admStaff')->with('success', 'Data berhasil dihapus.');
    }


    // --------------------------------------------------------------------------------------------------------------------------


    public function admTugasStaff()
    {
        $totalTugasKumpul = m_pengumpulanLK::where('role', 'admin')->count();
        $admTugas = m_pengumpulanLK::where('role', 'admin')->paginate(8);

        // $tugas = User::find($id);
        $data = array(
            'title' => 'Data Tugas Staff Admin'
        );
        return view('petinggi.subMenu.admin.admTugasStaff', $data, ['admTugas' => $admTugas, 'totalTugasKumpul' => $totalTugasKumpul]);
    }

    public function updateTugasStaff(Request $request, $id)
    {
        $request->validate([
            'no_pekerja'            => 'required',
            'nama_pekerja'          => 'required',
            'role'                  => 'required',
            'kategori_laporan'      => 'required',
            'waktu_pengumpulan'     => 'required',
            'tanggal_pengumpulan'   => 'required',
            'revisi_tugas'          => 'file|mimes:pdf,doc,docx,csv',
            'acc_tugas'             => 'required',
        ]);

        $user = m_pengumpulanLK::find($id);

        if ($request->hasFile('revisi_tugas')) {
            // Simpan file baru
            $namaFile = $request->file('revisi_tugas')->storeAs('revisiTugasKaryawan', uniqid() . '.' . $request->file('revisi_tugas')->getClientOriginalExtension());
            $user->revisi_tugas = $namaFile;
        }

        $user->fill([
            'no_pekerja'            => $request->input('no_pekerja'),
            'nama_pekerja'          => $request->input('nama_pekerja'),
            'role'                  => $request->input('role'),
            'kategori_laporan'      => $request->input('kategori_laporan'),
            'waktu_pengumpulan'     => $request->input('waktu_pengumpulan'),
            'tanggal_pengumpulan'   => $request->input('tanggal_pengumpulan'),
            'acc_tugas'             => $request->input('acc_tugas'),
        ]);

        $user->save();

        return redirect()->route('petinggi.subMenu.admin.admTugasStaff')->with('success', 'Data berhasil diperbarui.');
    }

    public function downloadTugasRevisi($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function downloadTugasHasilRevisi($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->revisi_tugas);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function myProfile()
    {
        $data = array(
            'title' => 'Profile Page'
        );
        return view('petinggi.myProfile', $data);
    }

    public function deleteTugasStaff($id)
    {
        $user = m_pengumpulanLK::find($id);
        if (!$user) {
            return redirect()->route('petinggi.subMenu.admin.admTugasStaff')->with('error', 'Data not found.');
        }

        if ($user->tugas_kerja) {
            Storage::delete('laporan/' . $user->tugas_kerja);
        }
        if ($user->revisi_tugas) {
            Storage::delete('revisiTugasKaryawan/' . $user->revisi_tugas);
        }

        $user->delete();
        return redirect()->route('petinggi.subMenu.admin.admTugasStaff')->with('success', 'Data berhasil dihapus.');
    }

    // --------------------------------------------------------------------------------------------------------------------------

    public function admAbsensiStaff()
    {
        $totalAbsensi = m_absensi::where('role', 'admin')->count();
        $Absensi = m_absensi::where('role', 'admin')->paginate(8);

        $data = array(
            'title' => 'Absensi Page'
        );
        return view('petinggi.subMenu.admin.admAbsensiStaff', $data, ['totalAbsensi' => $totalAbsensi, 'absensi' => $Absensi]);
    }

    public function admUpdateAbsensiStaff(Request $request, $id)
    {
        $request->validate([
            'no_pekerja'            => 'required',
            'nama_pekerja'          => 'required',
            'role'                  => 'required',
            'jam_masuk'             => 'required',
            'jam_keluar'            => 'required',
            'tanggal_masuk'         => 'required',
            'waktu_kerja'           => 'required',
        ]);

        $user = m_absensi::find($id);

        // if ($request->hasFile('revisi_tugas')) {
        //     // Simpan file baru
        //     $namaFile = $request->file('revisi_tugas')->storeAs('revisiTugasKaryawan', uniqid() . '.' . $request->file('revisi_tugas')->getClientOriginalExtension());
        //     $user->revisi_tugas = $namaFile;
        // }

        $user->fill([
            'no_pekerja'            => $request->input('no_pekerja'),
            'nama_pekerja'          => $request->input('nama_pekerja'),
            'role'                  => $request->input('role'),
            'jam_masuk'             => $request->input('jam_masuk'),
            'jam_keluar'            => $request->input('jam_keluar'),
            'tanggal_masuk'         => $request->input('tanggal_masuk'),
            'waktu_kerja'           => $request->input('waktu_kerja'),
        ]);

        $user->save();

        return redirect()->route('petinggi.subMenu.admin.admAbsensiStaff')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteAbsensiStaff($id) //Belum di deklarasikan di web.php
    {
        $user = m_absensi::find($id);
        if (!$user) {
            return redirect()->route('petinggi.subMenu.admin.admAbsensiStaff')->with('error', 'Data not found.');
        }

        if ($user->foto_user) {
            Storage::delete('fotoUsers/' . $user->foto_user);
        }

        $user->delete();
        return redirect()->route('petinggi.subMenu.admin.admAbsensiStaff')->with('success', 'Data berhasil dihapus.');
    }
}
