<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;

class LocaleController extends Controller
{
    public function change(string $locale)
    {
        $language = LanguageRepository::query()
            ->where('name', $locale)
            ->first();

        if ($language) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }

        return redirect()->back();
    }
}
