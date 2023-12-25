<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Http\Resources\HouseCollection;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        return new HouseCollection(House::all());
    }

    public function show(Request $request, House $house)
    {
        return new HouseResource($house);
    }

    public function store(StoreHouseRequest $request)
    {
        $validated = $request->validated();

        $house = House::create($validated);

        return new HouseResource($house);
    }

    public function update(UpdateHouseRequest $request, House $house)
    {
        $validated = $request->validated();

        $house->update($validated);

        return new HouseResource($house);
    }

    public function destroy(Request $request, House $house)
    {
        $house->delete();

        return response()->noContent();
    }
}
