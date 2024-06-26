<?php

namespace Database\Seeders;

use Bouncer;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class CreateRolesAndAbilitiesSeeder extends Seeder
{
    public function run()
    {

        $roles = [
            'doctor' => 'Doctor',
            'nutritionist' => 'Nutritionist',
            'receptionist' => 'Receptionist',
            'statistics-employee' => 'Statistics Employee',
            'pharmacist' => 'Pharmacist',
        ];

        foreach ($roles as $name => $title) {
            Bouncer::role()->firstOrCreate([
                'name' => $name,
                'title' => $title,
            ]);
        }


        $userData = [
            ['name' => 'women-nutritionist', 'user_name' => 'women-nutritionist', 'role' => 'women-nutritionist'],
            ['name' => 'child-nutritionist', 'user_name' => 'child-nutritionist', 'role' => 'child-nutritionist'],
            ['name' => 'women-doctor', 'user_name' => 'women-doctor', 'role' => 'women-doctor'],
            ['name' => 'child-doctor', 'user_name' => 'child-doctor', 'role' => 'child-doctor'],
            ['name' => 'receptionist', 'user_name' => 'receptionist', 'role' => 'receptionist'],
            ['name' => 'pharmacist', 'user_name' => 'pharmacist', 'role' => 'pharmacist'],
            ['name' => 'statistics-employee', 'user_name' => 'statistics-employee', 'role' => 'statistics-employee'],
        ];

        foreach ($userData as $data) {
            $employeeData = [
                'name' => $data['name'],
                'phone_number' => '1234567890',
                'user_name' => $data['user_name'],
                'password' => Hash::make('secret123'),
                'active' => true,
            ];

            $employee = Employee::firstOrCreate($employeeData);
            $employee->assign($data['role']);
        }
    }
}
