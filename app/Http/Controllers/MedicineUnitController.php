<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineUnitRequest;
use App\Http\Requests\UpdateMedicineUnitRequest;
use App\Http\Resources\MedicineUnitResource;
use App\Models\MedicineUnit;

class MedicineUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicineUnitResource::collection(MedicineUnit::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineUnitRequest $request)
    {
        $medicineUnit = new MedicineUnit();
        $medicineUnit->medicine_id = $request->medicine_id;
        $medicineUnit->code = $request->code;
        $medicineUnit->code = $request->code;
        $medicineUnit->name = $request->name;
        $medicineUnit->current_qty = $request->current_qty;
        $medicineUnit->reorder_qty = $request->reorder_qty;
        $medicineUnit->purchase_price = $request->purchase_price;
        $medicineUnit->selling_price = $request->selling_price;
        $medicineUnit->description = $request->description;
        $medicineUnit->save();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineUnit  $medicineUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineUnit $medicineUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineUnitRequest  $request
     * @param  \App\Models\MedicineUnit  $medicineUnit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineUnitRequest $request, MedicineUnit $medicineUnit)
    {
        $medicineUnit->code = $request->code;
        $medicineUnit->code = $request->code;
        $medicineUnit->name = $request->name;
        $medicineUnit->current_qty = $request->current_qty;
        $medicineUnit->reorder_qty = $request->reorder_qty;
        $medicineUnit->purchase_price = $request->purchase_price;
        $medicineUnit->selling_price = $request->selling_price;
        $medicineUnit->description = $request->description;
        $medicineUnit->update();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineUnit  $medicineUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineUnit $medicineUnit)
    {
        $medicineUnit->delete();
        return response()->json([
            'data'=>'Success'
        ]);
    }
}
