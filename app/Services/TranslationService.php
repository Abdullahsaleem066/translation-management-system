<?php

namespace App\Services;

use App\Models\Translation;

class TranslationService implements TranslationServiceInterface
{
    public function create(array $data)
    {
        return Translation::create($data);
    }

    public function update(Translation $translation, array $data)
    {
        $translation->update($data);
        return $translation;
    }

    public function delete(Translation $translation)
    {
        $translation->delete();
    }
}