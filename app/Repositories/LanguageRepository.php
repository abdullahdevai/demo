<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Http\Requests\Backend\LanguageRequest;
use App\Models\Language;

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
            $media = MediaRepository::storeByRequest($request->file('image'), 'flags', 'Image');
            $flagId = $media->id;
        }

        self::create([
            'flag' => $flagId,
            'title' => (string) $request->title,
            'name' => (string) $request->name,
        ]);
    }

    /**
     * Update language
     */
    public static function updateByRequest(Language $language, LanguageRequest $request)
    {
        $flagId = $language->flag;

        if ($request->hasFile('image')) {
            $media = MediaRepository::storeByRequest($request->file('image'), 'flags', 'Image');
            $flagId = $media->id;
        }

        self::update($language, [
            'flag' => $flagId,
            'title' => (string) $request->title,
            'name' => (string) $request->name,
        ]);
    }
}
