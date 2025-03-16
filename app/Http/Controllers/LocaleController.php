<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocaleRequest;
use App\Http\Requests\UpdateLocaleRequest;
use App\Repositories\LocaleRepositoryInterface;
use App\Services\LocaleServiceInterface;

class LocaleController extends Controller
{

    protected $localeService;
    protected $localeRepository;

    public function __construct(
        LocaleServiceInterface $localeService,
        LocaleRepositoryInterface $localeRepository
    ) {
        $this->localeService = $localeService;
        $this->localeRepository = $localeRepository;
    }

    public function index(Request $request)
    {
        $locales = $this->localeRepository->search($request);

        return response()->json($locales);
    }


    public function store(StoreLocaleRequest $request)
    {
        $locale = $this->localeService->create($request->validated());
        return response()->json($locale, 201);
    }


    public function show(Locale $locale)
    {
        $locale = $this->localeRepository->find($locale);
        return response()->json($locale);
    }


    public function update(UpdateLocaleRequest $request, Locale $locale)
    {
        $locale = $this->localeService->update($locale, $request->validated());
        return response()->json($locale);
    }


    public function destroy(Locale $locale)
    {
        $this->localeService->delete($locale);
        return response()->json(null, 204);
    }
}
