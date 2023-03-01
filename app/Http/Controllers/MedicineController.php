<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicineResource::collection(Medicine::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
        $medicine = new Medicine();
        $medicine->brand_id = $request->brand_id;
        $medicine->name = $request->name;
        $medicine->code = $request->code;
        $medicine->description = $request->description;
        $medicine->save();
        return response()->json([
           'data'=>'Success'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineRequest  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicine->brand_id = $request->brand_id;
        $medicine->name = $request->name;
        $medicine->code = $request->code;
        $medicine->description = $request->description;
        $medicine->update();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->json([
            'data'=>'Success'
        ]);
    }
}
