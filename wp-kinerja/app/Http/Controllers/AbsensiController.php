<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use illuminate\Support\Facades\Auth;
use App\Models\m_absensi;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Post;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Absensi Sistem'
        );
        return view('absensi.absen', $data);
    }

    public function processInput(Request $request)
    {
        $noPekerja      = $request->input('no_pekerja');
        $dataPekerja    = $this->getDataPekerja($noPekerja);
        $noPekerja      = Auth::user()->no_pekerja;
        $dataAbsensi    = m_absensi::where('no_pekerja', $noPekerja)->get();

        $checkinDone = m_absensi::where('tanggal_masuk', date('Y-m-d'))->first();

        return view('absensi.absen', ['dataPekerja' => $dataPekerja, 'dataAbsensi' => $dataAbsensi, 'checkinDone' => $checkinDone]);
    }


    private function getDataPekerja($noPekerja)
    {
        $pekerja = \App\Models\User::where('no_pekerja', $noPekerja)->first();
        if ($pekerja) {
            $data = [
                'nama_pekerja'  => $pekerja->nama_pekerja,
                'role'          => $pekerja->role,
                // 'posisi' => $pekerja->posisi,
            ];
        } else {
            $data = null;
        }

        return $data;
    }

    public function checkin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_pekerja'  => 'required',
            'no_pekerja'    => 'required',
            'foto_absensi'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan aturan validasi Anda
            'jam_masuk'     => 'required',
            'role'          => 'required',
            'tanggal_masuk' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses penyimpanan data checkin ke database
        $absensi                = new m_absensi();

        $absensi->nama_pekerja  = $request->input('nama_pekerja');
        $absensi->no_pekerja    = $request->input('no_pekerja');
        $file                   = $request->file('foto_absensi');
        $filename               = date('Y-m-d') . $file->getClientOriginalName();
        $path                   = 'absensi/' . $filename;
        $file->storeAs('public', $path);
        $absensi->foto_absensi  = $filename;
        $absensi->jam_masuk     = $request->input('jam_masuk');
        $absensi->tanggal_masuk = $request->input('tanggal_masuk');
        $absensi->role          = $request->input('role');
        $absensi->save();

        return redirect()->route('absensi.absen')->with('success-checkin', 'Anda berhasil checkin');
    }


    public function getDataByDate($tanggal, $nomor_pekerja)
    {
        $data = m_absensi::where('tanggal_masuk', $tanggal)
            ->where('nomor_pekerja', $nomor_pekerja)
            ->first();

        return response()->json($data);
    }

    public function laporanAbsensi()
    {
        $noPekerja      = Auth::user()->no_pekerja;
        // $dataAbsensi = m_absensi::find($id_absensi)->where('no_pekerja', $noPekerja)->first();
        $dataAbsensi    = m_absensi::where('no_pekerja', $noPekerja)->get();
        return view('absensi.absen', ['dataAbsensi' => $dataAbsensi]);
    }

    public function edit($id_absensi)
    {
        $absensi = m_absensi::find($id_absensi);
        return view('absensi.edit', compact('absensi'));
    }


    public function update(Request $request, $id_absensi)
    {
        $request->validate([
            'no_pekerja' => 'required',
            'nama_pekerja' => 'required',
            'foto_absensi' => 'required',
            'tanggal_masuk' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required', // Pastikan jam_keluar juga valid
        ]);

        // Ambil data absensi dari database
        $absensi = m_absensi::find($id_absensi);

        // Update data pada tabel absensi
        $absensi->no_pekerja = $request->no_pekerja;
        $absensi->nama_pekerja = $request->nama_pekerja;
        $absensi->foto_absensi = $request->foto_absensi;
        $absensi->jam_masuk = $request->jam_masuk;
        $absensi->jam_keluar = $request->jam_keluar;
        $absensi->tanggal_masuk = $request->tanggal_masuk;

        // Pisahkan jam, menit, dan detik dari jam_masuk dan jam_keluar
        list($jamMasuk, $menitMasuk, $detikMasuk) = explode(':', $request->jam_masuk);
        list($jamKeluar, $menitKeluar, $detikKeluar) = explode(':', $request->jam_keluar);

        // Hitung selisih jam, menit, dan detik
        $selisihJam     = $jamKeluar - $jamMasuk;
        $selisihMenit   = $menitKeluar - $menitMasuk;
        $selisihDetik   = $detikKeluar - $detikMasuk;

        // Menangani kasus jika selisih waktu negatif
        if ($selisihDetik < 0) {
            $selisihDetik += 60;
            $selisihMenit--;
        }
        if ($selisihMenit < 0) {
            $selisihMenit += 60;
            $selisihJam--;
        }

        // Konversi selisih ke format HH:mm:ss
        $selisihFormat  = sprintf('%02d:%02d:%02d', $selisihJam, $selisihMenit, $selisihDetik);

        // Simpan selisih waktu kerja
        $absensi->waktu_kerja = $selisihFormat;

        $absensi->save();

        return redirect('/absensi/absen')->with('success-checkout', 'Anda berhasil checkout');
    }


    public function processCheckout(Request $request)
    {
        $checkoutId = $request->input('checkout_id');
        $waktuKerja = $request->input('waktu_kerja');

        // Temukan entri Absensi berdasarkan ID
        $absensi = m_absensi::find($checkoutId);

        if ($absensi) {
            // Update waktu checkout dan tanggal hari ini
            $absensi->waktu_checkout    = $waktuKerja;
            $absensi->tanggal_checkout  = now()->toDateString(); // Tanggal hari ini

            // Simpan perubahan
            $absensi->save();

            return redirect()->route('absen')->with('success', 'Checkout berhasil.');
        }

        return redirect()->route('absen')->with('error', 'Data tidak ditemukan.');
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     $noPekerja = $request->input('no_pekerja');

    //     // Cek apakah pengguna yang login memiliki akses ke nomor pekerja ini
    //     if (Auth::check() && Auth::user()->no_pekerja == $noPekerja) {
    //         return $next($request);
    //     }

    //     return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menginput nomor pekerja lain.');
    // }
}
