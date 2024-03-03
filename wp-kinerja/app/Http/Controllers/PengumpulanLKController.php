<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\m_pengumpulanLK;
use App\Models\m_kategori;
use illuminate\Support\Facades\Auth;

class PengumpulanLKController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    // public function downloadTugasRevisi2($id)
    // {
    //     $tugas = m_pengumpulanLK::findOrFail($id);

    //     $filePath = storage_path('app/revisiTugasKaryawan' . $tugas->revisi_tugas);

    //     return response()->download($filePath, $tugas->nama_file);
    // }

    public function tampilDataTugas()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Admin Dashboard'
        );

        return view('pengumpulanLK.admin.admHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Admin Dashboard'
        ]);
    }

    public function downloadDocx()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcel()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugas($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanAdmin', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.admin.admHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugas(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);

        // Hapus file lama sebelum menyimpan yang baru
        // if ($tugas->tugas_kerja) {
        //     Storage::delete($tugas->tugas_kerja);
        // }

        $tugasKerja = $request->file('tugas_kerja');
        $namaFile = uniqid() . '.' . $tugasKerja->getClientOriginalExtension();

        // Simpan file di folder dengan format nama yang diinginkan
        $path = $tugasKerja->storeAs('laporanAdmin', $namaFile);

        $tugas->tugas_kerja = $path;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }



    // Punya Staff Marketing
    public function indexMarketing()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasMarketing()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Marketing Dashboard'
        );

        return view('pengumpulanLK.marketing.markHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Marketing Dashboard'
        ]);
    }

    public function downloadDocxMarketing()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelMarketing()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasMarketing($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Marketing(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanMarketing', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.marketing.markHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasMarketing(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanMarketing', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanMarketing', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Marketing

    // Start Punya Staff Pemasaran
    public function indexPemasaran()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasPemasaran()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Pemasaran Dashboard'
        );

        return view('pengumpulanLK.pemasaran.pemaHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Pemasaran Dashboard'
        ]);
    }

    public function downloadDocxPemasaran()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelPemasaran()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasPemasaran($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Pemasaran(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanPemasaran', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.pemasaran.pemaHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasPemasaran(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanPemasaran', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanPemasaran', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Pemasaran

    // Start Punya Staff Inventory
    public function indexInventory()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasInventory()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Inventory Dashboard'
        );

        return view('pengumpulanLK.inventory.invenHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Inventory Dashboard'
        ]);
    }

    public function downloadDocxInventory()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelInventory()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasInventory($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Inventory(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanInventory', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.inventory.invenHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasInventory(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanInventory', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanInventory', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Inventory

    // Start Punya Staff Qc
    public function indexQc()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasQc()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'qualityControl Dashboard'
        );

        return view('pengumpulanLK.qualityControl.qcHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Quality Control Dashboard'
        ]);
    }

    public function downloadDocxQc()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelQc()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasQc($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Qc(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanQc', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.qualityControl.qcHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasQc(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanQc', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanQc', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Qc

    // Start Punya Staff Logistik
    public function indexLogistik()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasLogistik()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Logistik Dashboard'
        );

        return view('pengumpulanLK.logistik.logHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Logistik Dashboard'
        ]);
    }

    public function downloadDocxLogistik()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelLogistik()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasLogistik($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Logistik(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanLogistik', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.logistik.logHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasLogistik(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanLogistik', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanLogistik', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Logistik

    // Start Punya Staff Qc
    public function indexChecker()
    {
        $data = array(
            'title' => 'Pengumpulan Laporan Tugas'
        );
        return view('pengumpulanLK.home', $data);
    }

    public function tampilDataTugasChecker()
    {
        $kategori = m_kategori::all();
        $noPekerja = Auth::user()->no_pekerja;
        $dataTugas = m_pengumpulanLK::where('no_pekerja', $noPekerja)->get();

        $data = array(
            'title' => 'Checker Dashboard'
        );

        return view('pengumpulanLK.checker.checHome', [
            'dataTugas' => $dataTugas,
            'kategori' => $kategori,
            $data,
            'title' => 'Checker Dashboard'
        ]);
    }

    public function downloadDocxChecker()
    {
        $path = storage_path('app/templateLaporan/tempWord.docx');

        return response()->download($path);
    }

    public function downloadExcelChecker()
    {
        $path = storage_path('app/templateLaporan/tempExcel.xlsx');

        return response()->download($path);
    }

    public function downloadTugasChecker($id)
    {
        $tugas = m_pengumpulanLK::findOrFail($id);

        $filePath = storage_path('app/' . $tugas->tugas_kerja);

        return response()->download($filePath, $tugas->nama_file);
    }

    public function proses_inputLK_Checker(Request $request)
    {
        $kategoriLaporan = $request->input('kategori_laporan');
        $noPekerja = $request->input('no_pekerja');
        $role = $request->input('role');
        $namaPekerja = $request->input('nama_pekerja');
        $tugasKerja = $request->file('tugas_kerja');

        // Lakukan operasi upload dan penyimpanan laporan disini.

        // Contoh: menyimpan ke direktori storage dengan nama file unik
        $namaFile = $tugasKerja->storeAs('laporanChecker', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());

        // Simpan informasi laporan ke database, termasuk kategori_laporan
        m_pengumpulanLK::create([
            'kategori_laporan' => $kategoriLaporan,
            'no_pekerja' => $noPekerja,
            'role' => $role,
            'nama_pekerja' => $namaPekerja,
            'tanggal_pengumpulan' => now(), // Tambahkan tanggal jika dibutuhkan
            'waktu_pengumpulan' => now()->format('H:i:s'), // Tambahkan waktu jika dibutuhkan
            'tugas_kerja' => $tugasKerja,
            'tugas_kerja' => $namaFile, // Pastikan nama kolom sesuai dengan database Anda
        ]);

        return redirect()->route('pengumpulanLK.checker.checHome')->with('success-upload-tugas', 'Laporan berhasil diunggah.');
    }

    public function prosesEditTugasChecker(Request $request, $id_lk)
    {
        $request->validate([
            'tugas_kerja' => 'required|file|mimes:docx,xlsx,pdf',
        ]);

        $tugas = m_pengumpulanLK::findOrFail($id_lk);
        $tugasKerja = $request->file('tugas_kerja');

        $file = $request->file('tugas_kerja');
        $namaFile = $tugasKerja->storeAs('laporanChecker', uniqid() . '.' . $tugasKerja->getClientOriginalExtension());
        $file->storeAs('laporanChecker', $namaFile);

        $tugas->tugas_kerja = $namaFile;
        $tugas->save();

        return redirect()->back()->with('success', 'Revisi Tugas berhasil diunggah.');
    }
    // End Punya Staff Checker
}
