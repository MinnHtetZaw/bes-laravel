<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHospitalBillRequest;
use App\Http\Requests\UpdateHospitalBillRequest;
use App\Http\Resources\HospitalBillResource;
use App\Models\Admission;
use App\Models\Bed;
use App\Models\HospitalBill;
use App\Models\MedicalRecord;
use App\Models\MedicineItem;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Support\Carbon;

class HospitalBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HospitalBillResource::collection(HospitalBill::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHospitalBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHospitalBillRequest $request)
    {
        $date = Carbon::today()->format('Y-m-d');
        $admission = Admission::find($request->admission_id);
        $bed = Bed::find($admission->bed_id);
        $room = Room::find($bed->room_id);
        $medical_record = MedicalRecord::where('patient_id',$admission->patient_id)->whereDate('date', $date)->get();
        $medical_record_id = $medical_record->pluck('id');
        $medicine_price = MedicineItem::whereIn('medical_record_id',$medical_record_id)->pluck('sub_total');
        $medicine_amount = $medicine_price->reduce(function ($carry, $item) {
            return $carry + $item;
        });
        $hospitalBill = new HospitalBill();
        $hospitalBill->date = $date;
        $hospitalBill->patient_id = $admission->patient_id;
        $hospitalBill->admission_id = $request->admission_id;
        $hospitalBill->room_charges = $room->price_per_day;
//        $hospitalBill->service_charges = $request->service_charges;
        $hospitalBill->medicine_charges = $medicine_amount;
//        $hospitalBill->machine_charges = $request->machine_charges;
        $total_amount = $room->price_per_day ?? 0 + $medicine_amount ?? 0;
        $hospitalBill->total_amount = $total_amount;
        $hospitalBill->net_amount = $total_amount - $request->deposit_amount ;
        $hospitalBill->save();
        return response()->json([
            'data' => 'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HospitalBill  $hospitalBill
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalBill $hospitalBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHospitalBillRequest  $request
     * @param  \App\Models\HospitalBill  $hospitalBill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalBillRequest $request, HospitalBill $hospitalBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HospitalBill  $hospitalBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(HospitalBill $hospitalBill)
    {
        //
    }
}
