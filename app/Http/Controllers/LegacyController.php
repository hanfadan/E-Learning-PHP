<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LegacyController extends Controller
{
    public function student(): Response
    {
        return $this->runLegacyFile(base_path('legacy/index.php'), base_path('legacy'));
    }

    public function admin(): Response
    {
        return $this->runLegacyFile(base_path('legacy/admin/index.php'), base_path('legacy/admin'));
    }

    public function includeFile(string $file): Response|BinaryFileResponse
    {
        $adminFile = base_path('legacy/admin/inc/'.$file);
        $studentFile = base_path('legacy/inc/'.$file);

        if (is_file($adminFile) && ! is_file($studentFile)) {
            return $this->runLegacyFile($adminFile, dirname($adminFile));
        }

        abort_unless(is_file($studentFile), 404);

        return $this->runLegacyFile($studentFile, dirname($studentFile));
    }

    public function adminIncludeFile(string $file): Response
    {
        $path = base_path('legacy/admin/inc/'.$file);
        abort_unless(is_file($path), 404);

        return $this->runLegacyFile($path, dirname($path));
    }

    public function videoConferenceFile(string $file): Response
    {
        $path = base_path('legacy/vcon/'.$file);
        abort_unless(is_file($path), 404);

        return $this->runLegacyFile($path, base_path('legacy'));
    }

    public function rootFile(string $file): Response
    {
        $path = base_path('legacy/'.$file);
        abort_unless(is_file($path), 404);

        return $this->runLegacyFile($path, base_path('legacy'));
    }

    private function runLegacyFile(string $file, string $workingDirectory): Response
    {
        $previousDirectory = getcwd();
        $previousReporting = error_reporting();
        $bufferLevel = ob_get_level();

        chdir($workingDirectory);
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

        ob_start();
        $content = '';
        try {
            include $file;
            $content = ob_get_clean();
        } finally {
            while (ob_get_level() > $bufferLevel) {
                $content .= ob_get_clean();
            }

            error_reporting($previousReporting);
            chdir($previousDirectory);
        }

        return response($content);
    }
}
