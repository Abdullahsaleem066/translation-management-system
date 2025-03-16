<?php

namespace App\Services;

use App\Models\Translation;

interface TranslationServiceInterface
{
    public function create(array $data);
    public function update(Translation $translation, array $data);
    public function delete(Translation $translation);
}