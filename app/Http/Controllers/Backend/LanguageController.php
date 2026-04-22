<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LanguageRequest;
use App\Repositories\LanguageRepository;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = LanguageRepository::query()
            ->with('flagImage')
            ->get();

        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        LanguageRepository::storeByRequest($request);

        return to_route('languages.index');
    }

    public function edit(int $id)
    {
        $language = LanguageRepository::query()
            ->with('flagImage')
            ->find($id);

        return view('admin.languages.edit', compact('language'));
    }

    public function update(LanguageRequest $request, int $id)
    {
        $language = LanguageRepository::find($id);
        LanguageRepository::updateByRequest($language, $request);

        return to_route('languages.index');
    }

    public function destroy(int $id)
    {
        $language = LanguageRepository::find($id);
        LanguageRepository::delete($language);

        return to_route('languages.index');
    }
}
