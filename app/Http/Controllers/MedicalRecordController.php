<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;


class MedicalRecordController extends Controller
{
    use ApiResponseTrait;


    /**
     * Store a newly created medical record in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|string|min:10|max:20',
            'residence_status' => 'required|in:Resident,Immigrant,Returnee',
            'special_needs' => 'required|boolean',
            'birth_date' => 'required|date',
            'related_person' => 'nullable|string|max:255',
            'related_person_phone_number' => 'nullable|string|min:10|max:20',
            // 'address.governorate_id' => ['required', 'exists:governorates,id'],
            // 'address.district_id' => ['required', 'exists:districts,id'],
            'address.subdistrict_id' => ['required', 'exists:subdistricts,id'],
            'address.name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return $this->unprocessable($validator->errors());
        }


        $validatedData = $validator->validated();

        $employee = auth('sanctum')->user();

        $existMedicalRecord = MedicalRecord::where([
            ['name', $request->input('name')],
            ['mother_name', $request->input('mother_name')],
            ['father_name', $request->input('father_name')]
        ])->first();

        if ($existMedicalRecord) {
            return $this->error(null, 'This patient already has a medical record');
        }

        $medicalRecord = new MedicalRecord($validatedData);
        $medicalRecord->employee()->associate($employee);
        $medicalRecord->save();

        $recordId = $medicalRecord->id;

        $addressData = $request->get('address');

        $address = $medicalRecord->addresses()->create([
            'name' => $addressData['name'],
            'subdistrict_id' => $addressData['subdistrict_id'],
        ]);


        $recordId = $medicalRecord->id;

        return $this->created($medicalRecord, 'Medical record created successfully!');
    }


    public function update(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        if (!$medicalRecord) {
            return $this->notFound('Medical record not found');
        }

        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|string|min:10|max:20',
            'residence_status' => 'required|in:Resident,Immigrant,Returnee',
            'special_needs' => 'required|boolean',
            'related_person' => 'nullable|string|max:255',
            'related_person_phone_number' => 'nullable|string|min:10|max:20',
            // 'address.governorate_id' => ['required', 'exists:governorates,id'],
            // 'address.district_id' => ['required', 'exists:districts,id'],
            'address.subdistrict_id' => ['required', 'exists:subdistricts,id'],
            'address.name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return $this->unprocessable($validator->errors());
        }

        $validatedData = $validator->validated();

        $medicalRecord->update($validatedData);

        $addressData = $request->get('address');

        if ($addressData) {
            $existingAddress = $medicalRecord->addresses()->first();

            if ($existingAddress) {
                $existingAddress->update($addressData);
            } else {
                $medicalRecord->addresses()->create($addressData);
            }
        }

        $responseData = $medicalRecord->fresh()->toArray();
        $address = $medicalRecord->addresses()->first();

        $responseData['address'] = $address ? $address->fresh()->toArray() : null;

        return $this->success($responseData, 'Medical record updated successfully!');
    }

    public function show(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::with('addresses')->find($request->route('id')); // Access ID from route

        if (!$medicalRecord) {
            return $this->notFound('Medical record not found');
        }
        return $this->success($medicalRecord, 'Medical record retrieved successfully!');

    }
    public function getAllVisitsByRecordId(Request $request, $id)
    {
      $medicalRecord = MedicalRecord::find($id);

      if (!$medicalRecord) {
        return $this->notFound('Medical record not found');
      }


      $isChild = $medicalRecord->category === 'child';
      $isWoman = $medicalRecord->category === 'pregnant';

      if ($isChild) {

        $childVisits = $medicalRecord->routineChildVisits()->get();


        $data = [
          'medical_record' => $medicalRecord->toArray(),
          'visits' => $childVisits->toArray(),
        ];

        return $this->success($data, 'Child visits retrieved successfully!');
      } else if ($isWoman) {

        $womenVisits = $medicalRecord->routineWomenVisits()->get();


        $data = [
          'medical_record' => $medicalRecord->toArray(),
          'visits' => $womenVisits->toArray(),
        ];

        return $this->success($data, 'Women visits retrieved successfully!');
      } else {

        return $this->notFound('ther is no visits');
      }
    }


}
