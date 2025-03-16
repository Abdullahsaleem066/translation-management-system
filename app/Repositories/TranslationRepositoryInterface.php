<?php

namespace App\Repositories;

interface TranslationRepositoryInterface
{
    public function search($request);
    public function find($id);
}