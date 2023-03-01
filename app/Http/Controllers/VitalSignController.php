<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVitalSignRequest;
use App\Http\Requests\UpdateVitalSignRequest;
use App\Models\VitalSign;

class VitalSignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVitalSignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVitalSignRequest $request)
    {
        $vitalSign = new VitalSign();
        $vitalSign->t = $request->t;
        $vitalSign->bp = $request->bp;
        $vitalSign->spo2 = $request->spo2;
        $vitalSign->b_w = $request->b_w; //Body Weight
        $vitalSign->pr = $request->pr;
        $vitalSign->hr = $request->hr;
        $vitalSign->rr = $request->rr;
        $vitalSign->complaint = $request->complaint;
        $vitalSign->physical_examination = $request->physical_examination;
        $vitalSign->procedure = $request->procedure;
        $vitalSign->diagnosis = $request->diagnosis;
        $vitalSign->next_appointment_date = $request->next_appointment_date;
        $vitalSign->ot_room = $request->ot_room;
        $vitalSign->save();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function show(VitalSign $vitalSign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVitalSignRequest  $request
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVitalSignRequest $request, VitalSign $vitalSign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VitalSign  $vitalSign
     * @return \Illuminate\Http\Response
     */
    public function destroy(VitalSign $vitalSign)
    {
        //
    }
}
