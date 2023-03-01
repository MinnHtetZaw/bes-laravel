<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Models\Admission;
use App\Models\MedicalRecord;
use App\Models\MedicineItem;
use App\Models\Patient;
use App\Models\ProcedureItem;
use App\Models\SurgeonService;
use App\Models\VitalSign;
use App\Models\Medication;
use App\Models\MedicationItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicalRecordResource::collection(MedicalRecord::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicalRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicalRecordRequest $request)
    {
        try {
            DB::beginTransaction();
            $medicalRecord = new MedicalRecord();
            $medicalRecord->patient_id = $request->patient_id;
            $medicalRecord->doctor_id = $request->doctor_id;
            $medicalRecord->date = $request->date;
            $medicalRecord->save();

            $vitalSign = new VitalSign();
            $vitalSign->medical_record_id = $medicalRecord->id;
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

            $medicationitem= new MedicationItem();
            $medicationitem->



            DB::commit();
            return response()->json([
                'data'=>'Success',
                'id'=>$medicalRecord->id,
            ],200);
        }catch (Exception $error){
            DB::rollBack();
            return response()->json([
                'data'=>$error,
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return new MedicalRecordResource($medicalRecord);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicalRecordRequest  $request
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalRecordRequest $request, MedicalRecord $medicalRecord)
    {
        try {
            DB::beginTransaction();
            $medicine_items = json_decode($request->medicine_items);
            foreach ($medicine_items as $medicine){
                $item = new MedicineItem();
                $item->medical_record_id = $medicalRecord->id;
                $item->medicine_id = $medicine->medicine_id;
                $item->qty = $medicine->qty;
                $item->day = $medicine->day;
                $item->dose = $medicine->dose;
                $item->sig = $medicine->sig;
                $item->selling_price = $medicine->selling_price;
                $item->total_qty = $medicine->total_qty;
                $item->sub_total = $medicine->selling_price * $medicine->total_qty;
                $item->save();
                $patient = Patient::find($medicalRecord->patient_id);
                $patient->credit_amount += $item->sub_total;
                $patient->update();
                $admission = Admission::where('patient_id',$medicalRecord->patient_id)->last();
                $admission->medicine_charges += $item->sub_total;
                $admission->update();
            }
//            if (isset($request->procedure_items)){
//                $procedure_items = json_decode($request->procedure_items);
//                foreach ($procedure_items as $procedure_item){
//                    $p_item = new ProcedureItem();
//                    $p_item->medical_record_id = $medicalRecord->id;
//                    $p_item->name = $procedure_item->name;
//                    $p_item->qty = $procedure_item->qty;
//                    $p_item->price = $procedure_item->price;
//                    $p_item->sub_total = $procedure_item->price * $procedure_item->qty;
//                    $p_item->save();
//                }
//            }
//            if (isset($request->surgeon_services)){
//                $surgeon_services = json_decode($request->surgeon_services);
//                foreach ($surgeon_services as $surgeon_service){
//                    $surgeon = new SurgeonService();
//                    $surgeon->medical_record_id = $medicalRecord->id;
//                    $surgeon->name = $surgeon_service->name;
//                    $surgeon->charges = $surgeon_service->charges;
//                    $surgeon->save();
//                }
//            }
            DB::commit();
            return response()->json([
                'data'=>$request->medicine_items,
            ],200);
        }catch (\Exception $error){
            DB::rollBack();
            return response()->json([
                'data'=>$error,
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
