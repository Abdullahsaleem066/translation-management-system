<?php

namespace App\Repositories;

interface LocaleRepositoryInterface
{
    public function search($request);
    public function find($id);
}