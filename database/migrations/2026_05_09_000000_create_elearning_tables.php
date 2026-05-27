<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tb_admin')) {
            return;
        }

        $schemaPath = database_path('schema/elearning.sql');
        if (! is_file($schemaPath)) {
            throw new RuntimeException("Missing database schema file: {$schemaPath}");
        }

        $schema = file_get_contents($schemaPath);
        $schema = preg_replace('/^\xEF\xBB\xBF/', '', $schema);

        DB::unprepared($schema);
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->tables() as $table) {
            Schema::dropIfExists($table);
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * @return array<int, string>
     */
    private function tables(): array
    {
        return [
            'tb_topik_tugas',
            'tb_topik_cbt',
            'tb_soal_upload',
            'tb_soal_pilgan',
            'tb_soal_essay',
            'tb_siswa',
            'tb_presensi',
            'tb_pengumuman',
            'tb_pengajar',
            'tb_nilai_upload',
            'tb_nilai_pilgan',
            'tb_nilai_essay',
            'tb_mapel_ajar',
            'tb_mapel',
            'tb_kelas_ajar',
            'tb_kelas',
            'tb_jurnal_harian',
            'tb_jawaban_upload',
            'tb_jawaban',
            'tb_file_materi',
            'tb_admin',
        ];
    }
};
