<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('staff_id')->unique();
            #First Name
            $table->string('name');
            $table->string('last_name');

            #unique() method is used to avoid same data in the list of row or column
            $table->string('email')->unique();
            $table->string('phone_number', 255)->unique();

            $table->date('hire_date');
            $table->string('job_id');

            $table->double('salary');
            $table->double('commission')->default(0)->nullable();
            $table->integer('manager_id');
            $table->integer('department_id');

            #nullable() method is used to allow null values for the column
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            #For Role
            $table->tinyInteger('is_role')->default(1)->comment('0: Employee, 1: HR');
            $table->timestamps();

//            DB::table('users')->insert([
//                'staff_id' => 'EMP-0001',
//                'name' => 'Admin',
//                'last_name' => 'Admin',
//                'email' => 'admin@hr-system.com',
//                'phone_number' => '01231231',
//                'hire_date' => '2021-10-11',
//                'job_id' => '1',
//                'salary' => '1000',
//                'manager_id' => '1',
//                'department_id' => '1',
//                'password' => Hash::make('12345678')
//            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
