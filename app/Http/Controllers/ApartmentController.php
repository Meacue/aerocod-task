<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Resources\ApartmentCollection;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(Request $request)
    {
        return new ApartmentCollection(Apartment::paginate(8));
    }

    public function show(Request $request, Apartment $apartment)
    {
        return new ApartmentResource($apartment);
    }

    public function store(StoreApartmentRequest $request)
    {
        $validated = $request->validated();

        $apartment = Apartment::create($validated);

        return new ApartmentResource($apartment);
    }

    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $validated = $request->validated();

        $apartment->update($validated);

        return new ApartmentResource($apartment);
    }

    public function destroy(Request $request, Apartment $apartment)
    {
        $apartment->delete();

        return response()->noContent();
    }
}
