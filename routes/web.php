<?php

use App\Http\Controllers\LegacyController;
use Illuminate\Support\Facades\Route;

Route::any('/', [LegacyController::class, 'student'])->name('student');
Route::any('/admin', [LegacyController::class, 'admin'])->name('admin');

Route::any('/inc/{file}', [LegacyController::class, 'includeFile'])
    ->where('file', '[A-Za-z0-9_\\-]+\\.php');

Route::any('/admin/inc/{file}', [LegacyController::class, 'adminIncludeFile'])
    ->where('file', '[A-Za-z0-9_\\-]+\\.php');

Route::any('/vcon/{file}', [LegacyController::class, 'videoConferenceFile'])
    ->where('file', '[A-Za-z0-9_\\-]+\\.php');

Route::any('/{file}', [LegacyController::class, 'rootFile'])
    ->where('file', 'soal\\.php|tugas\\.php|proses-tugas\\.php|editor-upload\\.php');
