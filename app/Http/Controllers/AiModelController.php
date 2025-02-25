<?php

namespace App\Http\Controllers;

use App\Http\Requests\AiModelRequest;
use App\Models\AiModel;

class AiModelController extends Controller
{
    public function index()
    {
        return AiModel::all();
    }

    public function store(AiModelRequest $request)
    {
        return AiModel::create($request->validated());
    }

    public function show(AiModel $aiModel)
    {
        return $aiModel;
    }

    public function update(AiModelRequest $request, AiModel $aiModel)
    {
        $aiModel->update($request->validated());

        return $aiModel;
    }

    public function destroy(AiModel $aiModel)
    {
        $aiModel->delete();

        return response()->json();
    }
}
