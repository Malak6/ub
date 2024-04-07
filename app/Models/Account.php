<?php

namespace App\Models;

use App\Models\MedicalRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_name',
        'password'
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class , 'account_id');
    }

}