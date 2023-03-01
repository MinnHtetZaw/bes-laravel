<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Floor;
use App\Models\Room;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomResource::collection(Room::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        try {
            DB::beginTransaction();
            $count = Room::where('floor_id',$request->floor_id)->count();
            $room = new Room();
            $room->name = $request->name;
            $room->description = $request->description;
            $room->type = $request->type;
            $room->floor_id = $request->floor_id;
            $room->price_per_day = $request->price_per_day;
            $room->save();

            $floor = Floor::find($room->floor_id);
            $floor->total_no_room = $count + 1;
            $floor->update();
            DB::commit();
            return response()->json([
                'data'=>$floor,
            ]);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'data'=>$exception,
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
