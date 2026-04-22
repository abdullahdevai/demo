<?php

namespace App\Repositories;

use App\Models\Language;
use Abedin\Maker\Repositories\Repository;
use App\Http\Requests\Backend\LanguageRequest;

class LanguageRepository extends Repository
{
    public static function model()
    {
        return Language::class;
    }
    /**
     * Store a new language
     */
    public static function storeByRequest(LanguageRequest $request)
    {
        $flagId = null;

        if ($request->hasFile('image')) {
            $flag = MediaRepository::storeByRequest($request->file('image'), $request->path, 'Image');
        };

        $filePath = base_path('lang/$request->name.json');

        return self::create([
            'flag'  => (int) $flag,
            'title' =>(string) $request->title,
            'name'  => (string) $request->name
        ]);
    }
}
