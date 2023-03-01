<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineItemRequest;
use App\Http\Requests\UpdateMedicineItemRequest;
use App\Models\MedicineItem;
use Illuminate\Database\Eloquent\Model;

class MedicineItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => MedicineItem::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineItemRequest $request)
    {
        $medicine_items = json_decode($request->medicine_items);
        foreach ($medicine_items as $medicine){
            $medicineItem = new MedicineItem();
            $medicineItem->medical_record_id = 12;
            $medicineItem->medicine_id = $medicine->medicine_id;
            $medicineItem->qty = $medicine->qty;
            $medicineItem->day = $medicine->day;
            $medicineItem->dose = $medicine->dose;
            $medicineItem->sig = $medicine->sig;
            $medicineItem->selling_price = 100;
            $medicineItem->total_qty = $medicine->total_qty;
            $medicineItem->sub_total = 100 * $medicine->total_qty;
            $medicineItem->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineItem  $medicineItem
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineItem $medicineItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineItemRequest  $request
     * @param  \App\Models\MedicineItem  $medicineItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineItemRequest $request, MedicineItem $medicineItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineItem  $medicineItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineItem $medicineItem)
    {
        //
    }
}
