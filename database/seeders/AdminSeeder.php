<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'staff_id' => 'EMP-0010',
            'name' => 'Admin',
            'last_name' => 'Global',
            'email' => 'admin@hr-system.com',
            'password' => bcrypt('123456789'),
            'phone_number' => '0123456789',
            'hire_date' => '2023-01-01',
            'position_id' => '1',
            'manager_id' => '1',
            'department_id' => '1',
            'address' => 'No. 1, Jalan 1, Taman 1, 11111, Kuala Lumpur',
            'category_employee' => '0',
            'bank_name' => 'Maybank',
            'bank_acc' => '123456789',
            'epf_no' => '123456789',
            'pcb_no' => '123456789',
            'ic_no' => '123456789',
            'is_role' => 1,
        ]);
    }
}
