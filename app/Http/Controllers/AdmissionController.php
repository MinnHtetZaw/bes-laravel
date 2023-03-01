<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Http\Resources\AdmissionResource;
use App\Models\Admission;
use App\Models\Bed;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdmissionResource::collection(Admission::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmissionRequest $request)
    {
        try {
            DB::beginTransaction();
            $admission = new Admission();
            $admission->patient_id = $request->patient_id;
            $admission->bed_id = $request->bed_id;
            $admission->doctor_id = $request->doctor_id;
            $admission->date = $request->date;
            $admission->time = $request->time;
            $admission->save();
//bed လူနာရှိကြောင်း status ပြ 1 
            $bed = Bed::find($admission->bed_id);
            $bed->patient_id = $admission->patient_id;
            $bed->status = '1';
            $bed->update();
            DB::commit();
            return response()->json([
                'data'=>'Success'
            ]);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'data'=>$exception
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function show(Admission $admission)
    {
        return new AdmissionResource($admission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdmissionRequest  $request
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmissionRequest $request, Admission $admission)
    {
        if (isset($request->bed_id)){
            $current_bed = Bed::find($admission->bed_id);
            $current_bed->status = '0';
            $current_bed->patient_id = null;
            $current_bed->update();
            $admission->bed_id = $request->bed_id;
            $admission->update();
            $new_bed = Bed::find($admission->bed_id);
            $new_bed->status = '1';
            $new_bed->patient_id = $admission->patient_id;
            $new_bed->update();
        }
        return response()->json([
            'data'=>'Success'
        ]);
//        try {
//            DB::beginTransaction();
//            $bed = Bed::find($admission->bed_id);
//            $bed->patient_id = null;
//            $bed->status = '0';
//            $bed->update();
//            DB::commit();
//            return response()->json([
//                'data'=>'Success'
//            ]);
//        }catch (Exception $exception){
//            DB::rollBack();
//            return response()->json([
//                'data'=>$exception
//            ]);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admission $admission)
    {
        //
    }
}
