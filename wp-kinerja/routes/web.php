<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PengumpulanLKController;
use App\Http\Controllers\RekapPenilaianController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\LaporanKinerjaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [PekerjaController::class, 'index'])->name('login');
Route::get('/petinggi-home', [PekerjaController::class, 'indexSuper'])->name('petinggi.superHome');
Route::post('/login-proses', [PekerjaController::class, 'login_proses'])->name('login-proses');

Route::get('/logout_proses', [PekerjaController::class, 'logout_proses'])->name('logout_proses');

Route::get('/registrasi', [PekerjaController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi-proses', [PekerjaController::class, 'registrasi_proses'])->name('registrasi-proses');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/absensi/absen', [AbsensiController::class, 'index'])->name('absensi.absen');
// Route::get('/absensi/absen', [AbsensiController::class, 'generateQRCode'])->name('absensi.absen');
// Route::post('checkin', [AbsensiController::class, 'checkin'])->name('checkin');
// Route::post('/process-no-pekerja', [AbsensiController::class, 'processNoPekerja'])->name('processNoPekerja');

Route::get('/absensi/absen', [AbsensiController::class, 'index']);
Route::post('/absensi/absen', [AbsensiController::class, 'processInput']);
Route::get('/absensi/absen', [AbsensiController::class, 'laporanAbsensi'])->name('absensi.absen');
Route::post('/checkin', [AbsensiController::class, 'checkin'])->name('absensi.checkin');
Route::post('/checkout', [AbsensiController::class, 'processCheckout'])->name('process.checkout');
Route::post('/update/{id_absensi}', [AbsensiController::class, 'update'])->name('process.update');


// Route::post('/input', [AbsensiController::class, 'processInput'])->middleware('checkNoPekerja');
// Route::get('/laporan-absensi/{nomor_pekerja}', [AbsensiController::class, 'laporanAbsensi']);
// Route::get('/absensi/absen/{no_pekerja}', [AbsensiController::class, 'laporanAbsensi'])->name('absensi.absen');

// Pengumpulan Laporan Kerja Admin
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'index'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/adminHome', [PengumpulanLKController::class, 'tampilDataTugas'])->name('pengumpulanLK.admin.admHome');
// Route::get('/download-tugas-revisi2/{id_lk}', [PengumpulanLKController::class, 'downloadTugasRevisi2']);
Route::post('/proses_inputLK', [PengumpulanLKController::class, 'proses_inputLK'])->name('admin.proses_inputLK');
Route::get('/download-docx', [PengumpulanLKController::class, 'downloadDocx']);
Route::get('/download-excel', [PengumpulanLKController::class, 'downloadExcel']);
Route::get('/download-tugas/{id_lk}', [PengumpulanLKController::class, 'downloadTugas']);
Route::post('/proses_edit_tugas/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugas'])->name('proses_edit_tugas');
// End Pengumpulan Laporan Kerja Admin

// Pengumpulan Laporan Kerja Marketing
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexMarketing'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/marketingHome', [PengumpulanLKController::class, 'tampilDataTugasMarketing'])->name('pengumpulanLK.marketing.markHome');
Route::post('/proses_inputLK_Marketing', [PengumpulanLKController::class, 'proses_inputLK_Marketing'])->name('marketing.proses_inputLK_Marketing');
Route::get('/download-docx-marketing', [PengumpulanLKController::class, 'downloadDocxMarketing']);
Route::get('/download-excel-marketing', [PengumpulanLKController::class, 'downloadExcelMarketing']);
Route::get('/download-tugas-marketing/{id_lk}', [PengumpulanLKController::class, 'downloadTugasMarketing']);
Route::post('/proses_edit_tugas_marketing/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasMarketing'])->name('proses_edit_tugas_marketing');
// End Pengumpulan Laporan Kerja Marketing

// Pengumpulan Laporan Kerja Pemasaran
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexMarketing'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/pemasaranHome', [PengumpulanLKController::class, 'tampilDataTugasPemasaran'])->name('pengumpulanLK.pemasaran.pemaHome');
Route::post('/proses_inputLK_Pemasaran', [PengumpulanLKController::class, 'proses_inputLK_Pemasaran'])->name('pemasaran.proses_inputLK_Pemasaran');
Route::get('/download-docx-pemasaran', [PengumpulanLKController::class, 'downloadDocxPemasaran']);
Route::get('/download-excel-pemasaran', [PengumpulanLKController::class, 'downloadExcelPemasaran']);
Route::get('/download-tugas-pemasaran/{id_lk}', [PengumpulanLKController::class, 'downloadTugasPemasaran']);
Route::post('/proses_edit_tugas_pemasaran/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasPemasaran'])->name('proses_edit_tugas_pemasaran');
// End Pengumpulan Laporan Kerja Pemasaran

// Pengumpulan Laporan Kerja Pemasaran
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexInventory'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/InventoryHome', [PengumpulanLKController::class, 'tampilDataTugasInventory'])->name('pengumpulanLK.inventory.invenHome');
Route::post('/proses_inputLK_Inventory', [PengumpulanLKController::class, 'proses_inputLK_Inventory'])->name('inventory.proses_inputLK_Inventory');
Route::get('/download-docx-inventory', [PengumpulanLKController::class, 'downloadDocxInventory']);
Route::get('/download-excel-inventory', [PengumpulanLKController::class, 'downloadExcelInventory']);
Route::get('/download-tugas-inventory/{id_lk}', [PengumpulanLKController::class, 'downloadTugasInventory']);
Route::post('/proses_edit_tugas_inventory/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasInventory'])->name('proses_edit_tugas_inventory');
// End Pengumpulan Laporan Kerja Pemasaran

// Pengumpulan Laporan Kerja QualityControl
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexQc'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/QcHome', [PengumpulanLKController::class, 'tampilDataTugasQc'])->name('pengumpulanLK.qualityControl.qcHome');
Route::post('/proses_inputLK_Qc', [PengumpulanLKController::class, 'proses_inputLK_Qc'])->name('qualityControl.proses_inputLK_Qc');
Route::get('/download-docx-qc', [PengumpulanLKController::class, 'downloadDocxQc']);
Route::get('/download-excel-qc', [PengumpulanLKController::class, 'downloadExcelQc']);
Route::get('/download-tugas-qc/{id_lk}', [PengumpulanLKController::class, 'downloadTugasQc']);
Route::post('/proses_edit_tugas_qc/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasQc'])->name('proses_edit_tugas_qc');
// End Pengumpulan Laporan Kerja QualityControl

// Pengumpulan Laporan Kerja Logistik
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexLogistik'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/LogistikHome', [PengumpulanLKController::class, 'tampilDataTugasLogistik'])->name('pengumpulanLK.logistik.logHome');
Route::post('/proses_inputLK_Logistik', [PengumpulanLKController::class, 'proses_inputLK_Logistik'])->name('logistik.proses_inputLK_Logistik');
Route::get('/download-docx-logistik', [PengumpulanLKController::class, 'downloadDocxLogistik']);
Route::get('/download-excel-logistik', [PengumpulanLKController::class, 'downloadExcelLogistik']);
Route::get('/download-tugas-logistik/{id_lk}', [PengumpulanLKController::class, 'downloadTugasLogistik']);
Route::post('/proses_edit_tugas_logistik/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasLogistik'])->name('proses_edit_tugas_logistik');
// End Pengumpulan Laporan Kerja Logistik 

// Pengumpulan Laporan Kerja Checker
Route::get('/pengumpulan-lk', [PengumpulanLKController::class, 'indexChecker'])->name('pengumpulanLK.home');
// Route::get('/adminHome', [PengumpulanLKController::class, 'admHome'])->name('pengumpulanLK.admin.admHome');
Route::get('/CheckerHome', [PengumpulanLKController::class, 'tampilDataTugasChecker'])->name('pengumpulanLK.checker.checHome');
Route::post('/proses_inputLK_Checker', [PengumpulanLKController::class, 'proses_inputLK_Checker'])->name('checker.proses_inputLK_Checker');
Route::get('/download-docx-checker', [PengumpulanLKController::class, 'downloadDocxChecker']);
Route::get('/download-excel-checker', [PengumpulanLKController::class, 'downloadExcelChecker']);
Route::get('/download-tugas-checker/{id_lk}', [PengumpulanLKController::class, 'downloadTugasChecker']);
Route::post('/proses_edit_tugas_checker/{id_lk}', [PengumpulanLKController::class, 'prosesEditTugasChecker'])->name('proses_edit_tugas_checker');
// End Pengumpulan Laporan Kerja Checker 

// Rekap Hasil Penilaian Staff Pekerja
Route::get('/rekapHasil-Penilaian', [RekapPenilaianController::class, 'index'])->name('rekapPenilaian.rekapHome');
Route::get('/rekapHasil-Penilaian', [RekapPenilaianController::class, 'showData'])->name('rekapPenilaian.rekapHome');
Route::get('/download-laporan', [RekapPenilaianController::class, 'downloadLaporan'])->name('download-laporan');

// Route::get('/CheckerHome', [PengumpulanLKController::class, 'tampilDataTugasChecker'])->name('pengumpulanLK.checker.checHome');
// End Rekap Hasil Penilaian Staff Pekerja

// Supervisor Admin
Route::get('/supervisor-admin', [SuperController::class, 'index'])->name('petinggi.superHome');
Route::get('/admStaff', [SuperController::class, 'admStaff'])->name('petinggi.subMenu.admin.admStaff');
Route::post('/petinggi/subMenu/admin/admUpdate/{id}', [SuperController::class, 'updateStaff'])->name('proses_edit_admStaff');
Route::delete('/deleteStaff/{id}', [SuperController::class, 'deleteStaff'])->name('deleteStaff');

Route::get('/myProfile', [SuperController::class, 'myProfile'])->name('myProfile');

Route::get('/admTugasStaff', [SuperController::class, 'admTugasStaff'])->name('petinggi.subMenu.admin.admTugasStaff');
Route::post('/petinggi/subMenu/admin/admTugasUpdate/{id_lk}', [SuperController::class, 'updateTugasStaff'])->name('proses_edit_admTugasStaff');
Route::get('/download-tugas-revisi/{id_lk}', [SuperController::class, 'downloadTugasRevisi']);
Route::get('/download-tugas-hasil-revisi/{id_lk}', [SuperController::class, 'downloadTugasHasilRevisi']);
Route::delete('/deleteTugasStaff/{id_lk}', [SuperController::class, 'deleteTugasStaff'])->name('deleteTugasStaff');

Route::get('/absensi-staff', [SuperController::class, 'admAbsensiStaff'])->name('petinggi.subMenu.admin.admAbsensiStaff');
Route::post('/petinggi/subMenu/admin/admUpdateAbsensiStaff/{id_absensi}', [SuperController::class, 'admUpdateAbsensiStaff'])->name('proses_edit_admUpdateAbsensiStaff');
Route::delete('/deleteAbsensiStaff/{id_absensi}', [SuperController::class, 'deleteAbsensiStaff'])->name('deleteAbsensiStaff');

Route::get('/laporan-mingguan', [LaporanKinerjaController::class, 'laporanMingguan'])->name('petinggi.subMenu.admin.admLaporanMingguan');
Route::get('/laporan-mingguan', [LaporanKinerjaController::class, 'getAllStaff'])->name('petinggi.subMenu.admin.admLaporanMingguan');

Route::get('/penilaian-kinerja/{id}', [LaporanKinerjaController::class, 'penilaianStaff'])->name('petinggi.subMenu.admin.admPenilaianStaff');
Route::post('/penilaian', [LaporanKinerjaController::class, 'submitPenilaian'])->name('proses_submit_admPenilaianMingguan');
// End Supervisor Admin

// HRD Staff
Route::get('/hard-staff', [HrdController::class, 'index'])->name('petinggi.subMenu.hrd.hrdHome');
Route::get('/hrdStaff', [HrdController::class, 'hrdStaff'])->name('petinggi.subMenu.hrd.hrdStaff');
Route::post('/petinggi/subMenu/hrd/hrdUpdate/{id}', [HrdController::class, 'updateHrd'])->name('proses_edit_hrd');
Route::delete('/deleteHrd/{id}', [SuperController::class, 'deleteHrd'])->name('deleteHrd');

Route::get('/controlAllStaff', [HrdController::class, 'allStaff'])->name('petinggi.subMenu.hrd.controlAllStaff');
Route::post('/petinggi/myProfile/{id}', [HrdController::class, 'updateMyProfile'])->name('updateMyProfile');
// End HRD Staff