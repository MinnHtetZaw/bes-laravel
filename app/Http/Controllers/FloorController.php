<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Resources\FloorResource;
use App\Models\Floor;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FloorResource::collection(Floor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFloorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFloorRequest $request)
    {
        $floor = new Floor();
        $floor->name = $request->name;
        $floor->description = $request->description;
        $floor->save();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        return new FloorResource($floor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFloorRequest  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        //
    }
}
