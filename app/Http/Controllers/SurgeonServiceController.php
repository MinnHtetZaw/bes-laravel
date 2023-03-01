<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurgeonServiceRequest;
use App\Http\Requests\UpdateSurgeonServiceRequest;
use App\Models\SurgeonService;

class SurgeonServiceController extends Controller
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
     * @param  \App\Http\Requests\StoreSurgeonServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurgeonServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurgeonService  $surgeonService
     * @return \Illuminate\Http\Response
     */
    public function show(SurgeonService $surgeonService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurgeonServiceRequest  $request
     * @param  \App\Models\SurgeonService  $surgeonService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurgeonServiceRequest $request, SurgeonService $surgeonService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurgeonService  $surgeonService
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurgeonService $surgeonService)
    {
        //
    }
}
