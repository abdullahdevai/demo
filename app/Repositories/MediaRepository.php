<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository extends Repository
{
    public static function model()
    {
        return Media::class;
    }
    /**
     * Store a image or file in media table
     */
    public static function storeByRequest(UploadedFile $file, string $path, string $type = "image")
    {
        $extension = $file->extension();
        $path = Storage::put('/' . trim($path, '/'), $file, 'public');
        $type = in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'gif']) ? 'image' : $extension;

        self::create([
            'type' => $type,
            'src' => $path,
        ]);
    }
}
