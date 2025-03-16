<?php

namespace App\Repositories;

use App\Models\Locale;
use App\Helpers\Helpers;
use Illuminate\Http\Request;

class LocaleRepository implements LocaleRepositoryInterface
{
    public function search($request)
    {
        $locale = Locale::query();

        if ($request->has('query')) {
            $searchQuery = $request->query('query');
            $locale->where(function ($query) use ($searchQuery) {
                $query->where('code', 'like', "%{$searchQuery}%")
                      ->orWhere('name', 'like', "%{$searchQuery}%");
            });
        }

        if ($request->has('translations')) {
            $locale->with('translations');
        }

        if ($request->has('tags')) {
            $locale->with('translations.tags');
        }

        return Helpers::pagination($locale, $request->pagination, $request->per_page);
    }

    public function find($id)
    {
        return Locale::findOrFail($id);
    }
}