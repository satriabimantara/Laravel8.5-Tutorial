<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Berhubung php artisan storage:link tidak bisa dijalankan di fat32 drive, maka function ini dibuat untuk mendapatkan file path dari folder Storage
     */
    public static function getUrl($path)
    {
        $url = "";
        if (!empty($path) && Storage::disk('public')->exists($path))
            $url = Storage::url($path);
        return $url;
    }
}
