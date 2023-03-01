<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicationItemRequest;
use App\Http\Requests\UpdateMedicationItemRequest;
use App\Models\MedicationItem;

class MedicationItemController extends Controller
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
     * @param  \App\Http\Requests\StoreMedicationItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicationItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicationItem  $medicationItem
     * @return \Illuminate\Http\Response
     */
    public function show(MedicationItem $medicationItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicationItemRequest  $request
     * @param  \App\Models\MedicationItem  $medicationItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicationItemRequest $request, MedicationItem $medicationItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicationItem  $medicationItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicationItem $medicationItem)
    {
        //
    }
}
