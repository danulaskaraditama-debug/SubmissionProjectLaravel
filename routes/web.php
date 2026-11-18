<?php 
 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;
 
Route::get('/', function () { 
    return view('welcome'); 
}); 
 
Route::get('/halo', function () { 
    return 'Halo, selamat datang di Laravel 13!'; 
}); 
 
// Arrow function (lebih ringkas) 
Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s')); 

// Parameter wajib 
Route::get('/profil/{nama}', function (string $nama) { 
    return "Halo, {$nama}!"; 
}); 
 
// Parameter opsional (beri nilai default) 
Route::get('/kategori/{nama?}', function (?string $nama = 'semua') { 
    return "Menampilkan kategori: {$nama}"; 
}); 
 
// Lebih dari satu parameter 
Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim) { 
    return "Kelas {$kode}, NIM {$nim}"; 
}); 

Route::get('/artikel/{id}', function (int $id) { 
    return "Artikel nomor {$id}"; 
})->whereNumber('id'); 
 
Route::get('/pengguna/{username}', function (string $username) { 
    return "Pengguna: {$username}"; 
})->whereAlpha('username'); 
 
Route::get('/kode/{kode}', function (string $kode) { 
    return "Kode: {$kode}"; 
})->where('kode', '[A-Z]{3}[0-9]{2}'); 

// Route::view tidak memerlukan closure 
Route::view('/tentang', 'tentang')->name('tentang'); 
 
Route::get('/kontak', function () { 
    return view('kontak', ['email' => 'info@kampus.ac.id']); 
})->name('kontak'); 

Route::prefix('admin')->name('admin.')->group(function () { 
 
    Route::get('/dashboard', fn () => 'Dashboard Admin') 
        ->name('dashboard');   // URL: /admin/dashboard, nama: admin.dashboard 
 
    Route::get('/pengaturan', fn () => 'Pengaturan Admin') 
        ->name('pengaturan');  // URL: /admin/pengaturan, nama: admin.pengaturan 
}); 

Route::redirect('/beranda', '/'); 

Route::get('/profil', [MahasiswaController::class, 'profil'])
    ->name('mahasiswa.profil');

Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])
    ->name('mahasiswa.daftar');


Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])
    ->name('mahasiswa.detail');

Route::get('/products', [ProductController::class,'index']);

Route::get('/products/{id}',[ProductController::class, 'show']);

// Route daftar jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

// Route form tambah jurusan
Route::get('/jurusan/create', [JurusanController::class, 'create'])
    ->name('jurusan.create');

// Route proses penyimpanan jurusan
Route::post('/jurusan', [JurusanController::class, 'store'])
    ->name('jurusan.store');

// Route detail jurusan
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
    ->name('jurusan.show');

// Route daftar mata kuliah
Route::get('/matakuliah', [MataKuliahController::class, 'index'])
    ->name('matakuliah.index');

// Route form tambah mata kuliah
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])
    ->name('matakuliah.create');

// Route proses penyimpanan mata kuliah
Route::post('/matakuliah', [MataKuliahController::class, 'store'])
    ->name('matakuliah.store');

// Route detail mata kuliah
Route::get('/matakuliah/{id}', [MataKuliahController::class, 'show'])
    ->name('matakuliah.show');

// Dieksekusi bila tidak ada route yang cocok (letakkan paling bawah) 
Route::fallback(function () { 
    return response('Halaman tidak ditemukan (kustom).', 404); 
});
