<?php

namespace App\Services;

use App\Models\Locale;

interface LocaleServiceInterface
{
    public function create(array $data);
    public function update(Locale $locale, array $data);
    public function delete(Locale $locale);
}

