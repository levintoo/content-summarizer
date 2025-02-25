<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreferenceRequest;
use App\Models\Preference;

class PreferenceController extends Controller
{
    public function index()
    {
        return Preference::all();
    }

    public function store(PreferenceRequest $request)
    {
        return Preference::create($request->validated());
    }

    public function show(Preference $preference)
    {
        return $preference;
    }

    public function update(PreferenceRequest $request, Preference $preference)
    {
        $preference->update($request->validated());

        return $preference;
    }

    public function destroy(Preference $preference)
    {
        $preference->delete();

        return response()->json();
    }
}
