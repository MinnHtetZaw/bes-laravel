<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('floor',\App\Http\Controllers\FloorController::class);
Route::resource('room',\App\Http\Controllers\RoomController::class);
Route::resource('bed',\App\Http\Controllers\BedController::class);
Route::resource('auth',\App\Http\Controllers\AuthController::class);
Route::resource('patient',\App\Http\Controllers\PatientController::class);
Route::resource('employee',\App\Http\Controllers\EmployeeController::class);
Route::resource('doctor',\App\Http\Controllers\DoctorController::class);
Route::resource('admission',\App\Http\Controllers\AdmissionController::class);
Route::resource('discharge',\App\Http\Controllers\DischargeController::class);
Route::resource('treatment',\App\Http\Controllers\TreatmentController::class);
Route::resource('vital-sign',\App\Http\Controllers\VitalSignController::class);
Route::resource('category',\App\Http\Controllers\CategoryController::class);
Route::resource('subcategory',\App\Http\Controllers\SubcategoryController::class);
Route::resource('brand',\App\Http\Controllers\BrandController::class);
Route::resource('medicine',\App\Http\Controllers\MedicineController::class);
Route::resource('medicine-unit',\App\Http\Controllers\MedicineUnitController::class);
Route::resource('doctor-schedule',\App\Http\Controllers\DoctorScheduleController::class);
Route::resource('medication',\App\Http\Controllers\MedicationController::class);
Route::resource('appointment',\App\Http\Controllers\AppointmentController::class);
Route::resource('medical-record',\App\Http\Controllers\MedicalRecordController::class);
Route::resource('medicine-item',\App\Http\Controllers\MedicineItemController::class);
Route::resource('hospital-bill',\App\Http\Controllers\HospitalBillController::class);
Route::resource('symptom-category',\App\Http\Controllers\SymptomCategoryController::class);
Route::resource('symptom',\App\Http\Controllers\SymptomController::class);
Route::resource('role',\App\Http\Controllers\UserRoleController::class);
Route::resource('admission-voucher',\App\Http\Controllers\AdmissionVoucherController::class);
Route::post('login',[AuthController::class,'login']);
Route::post('register',[\App\Http\Controllers\Auth\RegisterUserController::class,'register']);
Route::get('get-user/{id}',function ($id){
    return response()->json([
        'data' => User::find($id)
    ]);
});
Route::get('change-permission/{id}',[AuthController::class]);
Route::get('get-users',[\App\Http\Controllers\AuthController::class,'index']);


