<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBedRequest;
use App\Http\Requests\UpdateBedRequest;
use App\Http\Resources\BedResource;
use App\Models\Bed;
use App\Models\Floor;
use App\Models\Room;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BedResource::collection(Bed::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBedRequest $request)
    {
        try {
            DB::beginTransaction();
            $count = Bed::where('room_id',$request->room_id)->count();

            $bed = new Bed();
            $bed->name = $request->name;
            $bed->description = $request->description;
            $bed->room_id = $request->room_id;
            $bed->save();

            $room = Room::find($bed->room_id);
            $room->no_of_bed = $count + 1;
            $room->update();

            $floor = Floor::find($room->floor_id);
            $floor->total_no_bed = $count + 1;
            $floor->update();
            DB::commit();
            return response()->json([
                'data'=>'Success',
            ],200);

        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'data'=>$exception,
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBedRequest  $request
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBedRequest $request, Bed $bed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
        //
    }
}
