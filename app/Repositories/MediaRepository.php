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
    public static function storeByRequest(UploadedFile $file, string $folder, string $type = 'image'): Media
    {
        $filename = $file->getClientOriginalName();
        $extension = $file->extension();
        $path = Storage::put('/'.trim($folder, '/'), $file, 'public');
        $fileType = in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'gif']) ? 'image' : $extension;

        return self::create([
            'name' => $filename,
            'extension' => $extension,
            'src' => $path,
            'path' => $folder,
            'type' => $fileType,
        ]);
    }
}
