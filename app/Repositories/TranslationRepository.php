<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class TranslationRepository implements TranslationRepositoryInterface
{
    public function search($request)
    {
        $cacheKey = 'translations_search_' . md5(serialize($request->all()));
    
        return Cache::rememberForever($cacheKey, function () use ($request) {
            $translation = Translation::with(['locale', 'tags']);
    
            if ($request->has('query')) {
                $searchQuery = $request->query('query');
                $translation->where('key', 'like', "%{$searchQuery}%")
                            ->orWhere('value', 'like', "%{$searchQuery}%");
            }
    
            if ($request->has('tags')) {
                $tags = $request->query('tags');
                $translation->whereHas('tags', function ($query) use ($tags) {
                    $query->whereIn('tag_id', $tags);
                });
            }
    
            return Helpers::pagination($translation, $request->pagination, $request->per_page);
        });
    }

    public function find($id)
    {
        return Translation::findOrFail($id);
    }
}