<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcedureItemRequest;
use App\Http\Requests\UpdateProcedureItemRequest;
use App\Models\ProcedureItem;

class ProcedureItemController extends Controller
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
     * @param  \App\Http\Requests\StoreProcedureItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcedureItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcedureItem  $procedureItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProcedureItem $procedureItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcedureItemRequest  $request
     * @param  \App\Models\ProcedureItem  $procedureItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcedureItemRequest $request, ProcedureItem $procedureItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcedureItem  $procedureItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcedureItem $procedureItem)
    {
        //
    }
}
