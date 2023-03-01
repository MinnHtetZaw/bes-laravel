<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::when(request('search'),
            fn($q)=>$q
                ->where('patient_id','like','%'.request('search').'%'))
                ->get();
        return PatientResource::collection($patient);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $count = Patient::count();
        $patient = new Patient();
        $patient->patient_id = $request->date_of_birth.'-'.$count + 1;
        $patient->type = $request->type;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->phone = $request->phone;
        $patient->nrc = $request->nrc;
        $patient->address = $request->address;
        $patient->work_phone = $request->work_phone;
        $patient->emergency_phone = $request->emergency_phone;
        $patient->occupation = $request->occupation;
        $patient->nationality = $request->nationality;
        $patient->ethnicity = $request->ethnicity;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->save();
        return response()->json([
           'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->phone = $request->phone;
        $patient->nrc = $request->nrc;
        $patient->address = $request->address;
        $patient->work_phone = $request->work_phone;
        $patient->emergency_phone = $request->emergency_phone;
        $patient->occupation = $request->occupation;
        $patient->nationality = $request->nationality;
        $patient->ethnicity = $request->ethnicity;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->update();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
