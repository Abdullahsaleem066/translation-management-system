<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Helpers\Helpers;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TranslationRequest;
use App\Services\TranslationServiceInterface;
use App\Http\Requests\UpdateTranslationRequest;
use App\Repositories\TranslationRepositoryInterface;

class TranslationController extends Controller
{

    protected $translationService;
    protected $translationRepository;

    public function __construct(
        TranslationServiceInterface $translationService,
        TranslationRepositoryInterface $translationRepository
    ) {
        $this->translationService = $translationService;
        $this->translationRepository = $translationRepository;
    }

    public function index(Request $request)
    {
        $translations = $this->translationRepository->search($request);

        return response()->json($translations);
    }

    public function store(TranslationRequest $request)
    {
        $translation = $this->translationService->create($request->validated());
        Cache::forget('translations_search');
        return response()->json($translation, 201);
    }

    public function show(Translation $translation)
    {
        $translation = $this->translationRepository->find($translation);
        return response()->json($translation);
    }


    public function update(UpdateTranslationRequest $request, Translation $translation)
    {
        $translation = $this->translationService->update($translation, $request->validated());
        Cache::forget('translations_search');
        return response()->json($translation);
    }

    public function destroy(Translation $translation)
    {
        $this->translationService->delete($translation);
        return response()->json(null, 204);
    }
}
