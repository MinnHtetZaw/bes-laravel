<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSymptomCategoryRequest;
use App\Http\Requests\UpdateSymptomCategoryRequest;
use App\Models\SymptomCategory;

class SymptomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data'=>SymptomCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSymptomCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSymptomCategoryRequest $request)
    {
        $symptomCategory = new SymptomCategory();
        $symptomCategory->name = $request->name;
        $symptomCategory->description = $request->description;
        $symptomCategory->save();
        return response()->json([
            'data'=>'Success',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SymptomCategory  $symptomCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SymptomCategory $symptomCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSymptomCategoryRequest  $request
     * @param  \App\Models\SymptomCategory  $symptomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSymptomCategoryRequest $request, SymptomCategory $symptomCategory)
    {
        $symptomCategory->name = $request->name;
        $symptomCategory->description = $request->description;
        $symptomCategory->update();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SymptomCategory  $symptomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SymptomCategory $symptomCategory)
    {
        $symptomCategory->delete();
        return response()->json([
            'data'=>'Success',
        ]);
    }
}
