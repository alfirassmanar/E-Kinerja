<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_pengumpulanLK;
use App\Models\m_kategori;
use App\Models\m_absensi;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class RekapPenilaianController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Rekap Hasil Penilaian'
        );
        return view('rekapPenilaian.rekapHome', $data);
    }

    public function showData()
    {
        $noPekerja  = Auth::user()->no_pekerja;
        $absensi    = m_absensi::where('no_pekerja', $noPekerja)->get();
        $dataTugas  = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        //$RekapPenilaian = $absensi->concat($dataTugas); // Menggabungkan dua kumpulan data

        $data = array(
            'title' => 'Rekap Penilaian Dashboard'
        );

        return view('rekapPenilaian.rekapHome', [
            $data,
            'title' => 'Rekap Penilaian Dashboard',
            'RekapPenilaian' => $absensi,
            'RekapPenilaianLK' => $dataTugas,
        ]);
    }

    // public function downloadLaporan(Request $request)
    // {
    //     $bulan = $request->input('bulan');
    //     $startDate = Carbon::now()->setMonth($bulan)->startOfMonth();
    //     $endDate = Carbon::now()->setMonth($bulan)->endOfMonth();

    //     $laporan = m_pengumpulanLK::whereBetween('tanggal_pengumpulan', [$startDate, $endDate])->get();

    //     if ($laporan->isEmpty()) {
    //         return redirect()->back()->with('error', 'Tidak ada data laporan pada bulan tersebut.');
    //     }

    //     // Buat nama file ZIP dinamis
    //     $zipFilename = 'Laporan_' . Carbon::now()->format('Y-m-d_H-i-s') . '.zip';

    //     return response()->streamDownload(function () use ($laporan) {
    //         $zip = new \ZipArchive();
    //         $zip->open('php://output', \ZipArchive::CREATE);

    //         foreach ($laporan as $file) {
    //             // Tambahkan setiap file ke dalam zip
    //             $contents = Storage::get($file->revisi_tugas);
    //             $zip->addFromString($file->revisi_tugas, $contents);
    //         }

    //         $zip->close();
    //     }, $zipFilename, [
    //         'Content-Type' => 'application/zip',
    //         'Content-Disposition' => 'attachment; filename="' . $zipFilename . '"',
    //     ]);
    // }
}
