<?php

namespace App\Http\Controllers;

use App\Models\MedicalCenter;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class MedicalCenterController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalCenters = MedicalCenter::all();
        return $this->success($medicalCenters);
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
     * @param  \App\Models\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalCenter $medicalCenter)
    {
        //
    }
}
