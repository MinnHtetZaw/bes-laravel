<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorScheduleRequest;
use App\Http\Requests\UpdateDoctorScheduleRequest;
use App\Models\DoctorSchedule;

class DoctorScheduleController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorScheduleRequest $request)
    {
        $doctorSchedule = new DoctorSchedule();
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->date = $request->date;
        $doctorSchedule->start_time = $request->start_time;
        $doctorSchedule->end_time = $request->end_time;
        $doctorSchedule->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorScheduleRequest  $request
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorScheduleRequest $request, DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        //
    }
}
