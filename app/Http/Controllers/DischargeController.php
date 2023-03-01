<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDischargeRequest;
use App\Http\Requests\UpdateDischargeRequest;
use App\Http\Resources\DischargeResource;
use App\Models\Admission;
use App\Models\Bed;
use App\Models\Discharge;

class DischargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DischargeResource::collection(Discharge::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDischargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDischargeRequest $request)
    {
        $discharge = new Discharge();
        $discharge->patient_id = $request->patient_id;
        $discharge->doctor_id = $request->doctor_id;
        $discharge->admission_id = $request->admission_id;
        $discharge->p_ID = $request->p_ID;
        $discharge->patient_name = $request->patient_name;
        $discharge->approve_doctor = $request->approve_doctor;
        $discharge->room_ID = $request->room_ID;
        $discharge->bed_ID = $request->bed_ID;
        $discharge->date = $request->date;
        $discharge->time = $request->time;
        $discharge->save();

        $admission = Admission::find($discharge->admission_id);
        $admission->status = 1;
        $admission->update();
        $bed = Bed::find($admission->bed_id);
        $bed->status = '0';
        $bed->patient_id = null;
        $bed->update();
        return response()->json([
            'data' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function show(Discharge $discharge)
    {
        return new DischargeResource($discharge);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDischargeRequest  $request
     * @param  \App\Models\Discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDischargeRequest $request, Discharge $discharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discharge $discharge)
    {
        //
    }
}
