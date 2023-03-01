<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdmissionVoucherRequest;
use App\Http\Requests\UpdateAdmissionVoucherRequest;
use App\Http\Resources\AdmissionVoucherResource;
use App\Models\AdmissionVoucher;

class AdmissionVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdmissionVoucherResource::collection(AdmissionVoucher::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdmissionVoucherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmissionVoucherRequest $request)
    {
        $admissionVoucher = new AdmissionVoucher();
        $admissionVoucher->patient_id = $request->patient_id;
        $admissionVoucher->admission_id = $request->admission_id;
        $admissionVoucher->discharge_id = $request->discharge_id;
        $admissionVoucher->hospital_charges = $request->hospital_charges;
        $admissionVoucher->medicine_charges = $request->medicine_charges;
        $admissionVoucher->laboratory_charges = $request->laboratory_charges;
        $admissionVoucher->radiology_charges = $request->radiology_charges;
        $admissionVoucher->total_amount = $request->total_amount;
        $admissionVoucher->pay_amount = $request->pay_amount;   
        $admissionVoucher->balance_amount = $request->balance_amount;   
        $admissionVoucher->refund_amount = $request->refund_amount;   
        $admissionVoucher->payment_type = $request->payment_type;   
        $admissionVoucher->date = $request->date;   
        $admissionVoucher->save();
        return response()->json([
            'data' => 'Success'
        ]);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdmissionVoucher  $admissionVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(AdmissionVoucher $admissionVoucher)
    {
        return new AdmissionVoucherResource($admissionVoucher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdmissionVoucherRequest  $request
     * @param  \App\Models\AdmissionVoucher  $admissionVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmissionVoucherRequest $request, AdmissionVoucher $admissionVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdmissionVoucher  $admissionVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdmissionVoucher $admissionVoucher)
    {
        //
    }
}
