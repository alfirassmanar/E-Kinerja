<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\m_pengumpulanLK;
use App\Models\m_absensi;
use App\Models\m_laporan_kinerja;
use App\Models\User;
use App\Models\m_role;

class LaporanKinerjaController extends Controller
{
    public function laporanMingguan()
    {
        $data = array(
            'title' => 'Laporan Mingguan'
        );
        return view('petinggi.subMenu.admin.admLaporanMingguan', $data);
    }

    public function getAllStaff()
    {
        $totalAdmins = User::where('role', 'admin')->count();
        $Users = User::where('role', 'admin')->paginate(8);
        $role = m_role::all();

        // $tugas = User::find($id);
        $data = array(
            'title' => 'Data Staff Admin'
        );
        return view('petinggi.subMenu.admin.admLaporanMingguan', $data, ['Users' => $Users, 'totalAdmins' => $totalAdmins, 'roles' => $role]);
    }

    public function penilaianStaff($id_karyawan)
    {
        $user = User::find($id_karyawan);

        if (!$user) {
            // Handle jika pengguna tidak ditemukan, misalnya redirect atau pesan kesalahan
            return redirect()->route('petinggi.subMenu.admin.admPenilaianStaff')->with('error', 'Pengguna tidak ditemukan.');
        }

        $data = array(
            'title' => 'Penilaian Kinerja',
            'user' => $user,
        );

        return view('petinggi.subMenu.admin.admPenilaianStaff', $data);
    }

    public function submitPenilaian(Request $request)
    {
        // Validasi data formulir jika diperlukan
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Ambil data dari formulir
        $no_pekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $tanggal_penilaian = $request->input('tanggal_penilaian');
        $nama_pekerja = $request->input('nama_pekerja');

        $pilihan1a = $request->input('pilihan1a');
        $pilihan2a = $request->input('pilihan2a');
        $pilihan3a = $request->input('pilihan3a');
        $pilihan4a = $request->input('pilihan4a');

        $nilaiMingguan = '';
        if ($pilihan1a) {
            $nilaiMingguan = 'Baik';
        } elseif ($pilihan2a) {
            $nilaiMingguan = 'Cukup Baik';
        } elseif ($pilihan3a) {
            $nilaiMingguan = 'Telat';
        } elseif ($pilihan4a) {
            $nilaiMingguan = 'Kurang';
        }

        m_laporan_kinerja::create([
            'nilai_mingguan' => $nilaiMingguan,
            'no_pekerja' => $no_pekerja,
            'role' => $role,
            'tanggal_penilaian' => $tanggal_penilaian,
            'nama_pekerja' => $nama_pekerja,
        ]);

        // Redirect atau lakukan sesuatu setelah menyimpan data ke dalam database
        return redirect()->route('index')->with('success', 'Data berhasil disimpan.');
    }
}
