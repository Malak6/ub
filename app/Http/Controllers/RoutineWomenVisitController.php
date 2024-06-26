<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Validation\Rule;
use App\Models\RoutineWomenVisit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class RoutineWomenVisitController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createWomenVisit(Request $request){

        $validator = Validator::make($request->all(), [
            'medical_record_id' => ['required', 'integer', 'exists:medical_records,id'],
            'z_score' => ['required', 'integer'],
            'current_status' => [
                'required',
                Rule::in(['mam','normal']),
            ],
            'status_type' => [
                'required',
                Rule::in(['pregnant','lactating','non']),
            ],
            'date' => ['required', 'date'],

            ]);

        if ($validator->fails()) {
            return $this->unprocessable($validator->errors());
        }

        
        if (! MedicalRecord::where('id', $request->input('medical_record_id'))->exists()) {
            return $this->unprocessable($routineWomenVisit , 'The specified medical record does not exist.');
        }
    

        $employee = auth('sanctum')->user();

        $routineWomenVisit = RoutineWomenVisit::create([
            'employee_id' => $employee->id,
            'employee_choise_id' => $employee->employeeChoises()->first()->id,
            'medical_record_id' => $request->input('medical_record_id'),
            'current_status' =>  $request->input('current_status'),
            'status_type'  =>   $request->input('status_type'),
            'z_score' =>  $request->input('z_score'),
            'date' =>   $request->input('date'),
        ]);
        return $this->created($routineWomenVisit);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoutineWomenVisit  $routineWomenVisit
     * @return \Illuminate\Http\Response
     */
    public function show(RoutineWomenVisit $routineWomenVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoutineWomenVisit  $routineWomenVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutineWomenVisit $routineWomenVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoutineWomenVisit  $routineWomenVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoutineWomenVisit $routineWomenVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoutineWomenVisit  $routineWomenVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutineWomenVisit $routineWomenVisit)
    {
        //
    }
}
