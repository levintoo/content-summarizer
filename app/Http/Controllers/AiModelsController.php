<?php

namespace App\Http\Controllers;

use App\Http\Requests\AiModelRequest;
use App\Models\AiModel;

class AiModelsController extends Controller
{
    public function index()
    {
        return AiModel::all();
    }

    public function store(AiModelRequest $request)
    {
        return AiModel::create($request->validated());
    }

    public function show(AiModel $aiModels)
    {
        return $aiModels;
    }

    public function update(AiModelRequest $request, AiModel $aiModels)
    {
        $aiModels->update($request->validated());

        return $aiModels;
    }

    public function destroy(AiModel $aiModels)
    {
        $aiModels->delete();

        return response()->json();
    }
}
