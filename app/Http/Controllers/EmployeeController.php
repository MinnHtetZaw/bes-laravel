<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->title = $request->title;
        $employee->position = $request->position;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->department = $request->department;
        $employee->specialization = $request->specialization;
        $employee->description = $request->description;
        $employee->save();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->title = $request->title;
        $employee->position = $request->position;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->department = $request->department;
        $employee->specialization = $request->specialization;
        $employee->description = $request->description;
        $employee->update();
        return response()->json([
            'data'=>'Success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
