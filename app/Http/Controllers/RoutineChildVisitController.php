<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Validation\Rule;
use App\Models\RoutineChildVisit;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class RoutineChildVisitController extends Controller
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
     * @param  \App\Models\RoutineChildVisit  $routineChildVisit
     * @return \Illuminate\Http\Response
     */
    public function show(RoutineChildVisit $routineChildVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoutineChildVisit  $routineChildVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutineChildVisit $routineChildVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoutineChildVisit  $routineChildVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoutineChildVisit $routineChildVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoutineChildVisit  $routineChildVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutineChildVisit $routineChildVisit)
    {
        //
    }

    public function createChildVisit(Request $request){

        $validator = Validator::make($request->all(), [
            'medical_record_id' => ['required', 'integer', 'exists:medical_records,id'],
            'activity' => ['required', 'string'],
            'z_score' => ['required', 'integer'],
            'current_status' => [
                'required',
                Rule::in(['sam', 'mam', 'normal']),
            ],
            'date' => ['required', 'date'],

            ]);

        if ($validator->fails()) {
            return $this->unprocessable($validator->errors());
        }


        if (! MedicalRecord::where('id', $request->input('medical_record_id'))->exists()) {
            return $this->unprocessable($routineChildVisit , 'The specified medical record does not exist.');
        }

        
        $employee = auth('sanctum')->user();

        $routineChildVisit = RoutineChildVisit::create([
            'employee_id' => $employee->id,
            'employee_choise_id' => $employee->employeeChoises()->first()->id,
            'medical_record_id' => $request->input('medical_record_id'),
            'current_status' =>  $request->input('current_status'),
            'activity'  =>   $request->input('activity'),
            'z_score' =>  $request->input('z_score'),
            'date' =>   $request->input('date'),
        ]);

        return $this->created($routineChildVisit);

    }
}
