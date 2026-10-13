<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function profil()
    {
        $nama = 'Danu Laskar Aditama';
        $nim = '242520122';
        $prodi = 'Teknologi Informasi';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }

    public function daftar()
    {
        $mahasiswa = [
            ['nama' => 'Andi', 'nim' => '242520101', 'ipk' => 3.80],
            ['nama' => 'Santoso', 'nim' => '242520102', 'ipk' => 3.40],
            ['nama' => 'Citra', 'nim' => '242520103', 'ipk' => 3.60],
            ['nama' => 'Dewi', 'nim' => '242520104', 'ipk' => 2.85],
            ['nama' => 'Eko', 'nim' => '242520105', 'ipk' => 3.10],
        ];

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }

    public function detail(string $nim)
    {
    $mahasiswa = [
        ['nama' => 'Andi', 'nim' => '242520101', 'ipk' => 3.80],
        ['nama' => 'Santoso', 'nim' => '242520102', 'ipk' => 3.40],
        ['nama' => 'Citra', 'nim' => '242520103', 'ipk' => 3.60],
        ['nama' => 'Dewi', 'nim' => '242520104', 'ipk' => 2.85],
        ['nama' => 'Eko', 'nim' => '242520105', 'ipk' => 3.10],
    ];

    $data = collect($mahasiswa)->firstWhere('nim', $nim);

    if (!$data) {
        abort(404);
    }

    return view('mahasiswa.detail', ['m' => $data]);
    }
}
