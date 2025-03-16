<?php

namespace App\Services;

use App\Models\Locale;
use App\Services\LocaleServiceInterface;

class LocaleService implements LocaleServiceInterface
{
    public function create(array $data)
    {
        return Locale::create($data);
    }

    public function update(Locale $locale, array $data)
    {
        $locale->update($data);
        return $locale;
    }

    public function delete(Locale $locale)
    {
        $locale->delete();
    }
}