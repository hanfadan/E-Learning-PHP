<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('tb_kelas')->updateOrInsert(
            ['id_kelas' => 1],
            [
                'nama_kelas' => 'Demo Class',
                'wali_kelas' => 1,
                'ketua_kelas' => 1,
            ],
        );

        DB::table('tb_admin')->updateOrInsert(
            ['username' => 'admin'],
            [
                'nama_lengkap' => 'Demo Admin',
                'alamat' => 'Demo Address',
                'password' => md5('password'),
                'pass' => 'password',
            ],
        );

        DB::table('tb_pengajar')->updateOrInsert(
            ['username' => 'teacher'],
            [
                'nip' => 'TCH001',
                'nama_lengkap' => 'Demo Teacher',
                'tempat_lahir' => 'Demo',
                'tgl_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'alamat' => 'Demo Address',
                'foto' => 'anonim.png',
                'password' => md5('password'),
                'pass' => 'password',
                'status' => 'aktif',
            ],
        );

        DB::table('tb_siswa')->updateOrInsert(
            ['username' => 'student'],
            [
                'nis' => '0000000000000001',
                'nama_lengkap' => 'Demo Student',
                'tempat_lahir' => 'Demo',
                'tgl_lahir' => '2010-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Demo',
                'alamat' => 'Demo Address',
                'id_kelas' => '1',
                'thn_masuk' => 2026,
                'foto' => 'anonim.png',
                'password' => md5('password'),
                'pass' => 'password',
                'status' => 'aktif',
            ],
        );
    }
}
