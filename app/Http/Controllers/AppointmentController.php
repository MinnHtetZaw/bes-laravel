<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppointmentResource::collection(Appointment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->date;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->description = $request->description;
        $appointment->save();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
    //   return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->date;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->description = $request->description;
        $appointment->update();
        return response()-> json([
            'data'=>'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json([
            'data'=>'Success'
        ]);
    }
}
