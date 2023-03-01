<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicationRequest;
use App\Http\Resources\MedicationResource;
use App\Models\Medication;
use App\Models\MedicationItem;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicationResource::collection(Medication::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicationRequest $request)
    {
        try {
            DB::beginTransaction();
            $medication = new Medication();
            $medication->doctor_id = $request->doctor_id;
            $medication->patient_id = $request->patient_id;
            $medication->date = $request->date;
            $medication->note = $request->note;
            $medication->save();

            $medicine_items = json_decode($request->medicine_items);
            foreach ($medicine_items as $medicine){
                $item = new MedicationItem();
                $item->medication_id = $medication->id;
                $item->medicine_id = $medicine->medicine_id;
                $item->qty = $medicine->qty;
                $item->day = $medicine->day;
                $item->dose = $medicine->dose;
                $item->sig = $medicine->sig;
                $item->save();
            }
            DB::commit();
            return response()->json([
                'data'=>'Success',
            ]);
        }catch (Exception $error){
            DB::rollBack();
            return response()->json([
                'data'=>$error,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicationRequest  $request
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        try {
            DB::beginTransaction();

            if ($request->status == '1'){
                $medication->status = '1';
            }
            if ($request->status == '2'){
                $medication->status = '2';
            }
            $medication->update();
            DB::commit();
            return response()->json([
                'data'=>'Success',
            ]);
        }catch (Exception $error){
            DB::rollBack();
            return response()->json([
                'data'=>$error,
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        //
    }
}
