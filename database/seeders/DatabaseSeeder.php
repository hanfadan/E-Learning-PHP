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
            ['username' => 'demo_admin'],
            [
                'nama_lengkap' => 'Portfolio Demo Admin',
                'alamat' => 'Portfolio Review Account',
                'password' => md5('portfolio123'),
                'pass' => 'portfolio123',
            ],
        );

        DB::table('tb_pengajar')->updateOrInsert(
            ['username' => 'demo_teacher'],
            [
                'nip' => 'TCH001',
                'nama_lengkap' => 'Portfolio Demo Teacher',
                'tempat_lahir' => 'Demo',
                'tgl_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'alamat' => 'Portfolio Review Account',
                'foto' => 'anonim.png',
                'password' => md5('portfolio123'),
                'pass' => 'portfolio123',
                'status' => 'aktif',
            ],
        );

        DB::table('tb_siswa')->updateOrInsert(
            ['username' => 'demo_student'],
            [
                'nis' => '0000000000000001',
                'nama_lengkap' => 'Portfolio Demo Student',
                'tempat_lahir' => 'Demo',
                'tgl_lahir' => '2010-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Demo',
                'alamat' => 'Portfolio Review Account',
                'id_kelas' => '1',
                'thn_masuk' => 2026,
                'foto' => 'anonim.png',
                'password' => md5('portfolio123'),
                'pass' => 'portfolio123',
                'status' => 'aktif',
            ],
        );
    }
}
