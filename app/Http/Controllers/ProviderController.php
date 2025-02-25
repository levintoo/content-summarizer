<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        return Provider::all();
    }

    public function store(ProviderRequest $request)
    {
        return Provider::create($request->validated());
    }

    public function show(Provider $provider)
    {
        return $provider;
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

        return $provider;
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return response()->json();
    }
}
