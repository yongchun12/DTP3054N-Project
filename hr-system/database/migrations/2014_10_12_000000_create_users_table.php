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

            //Auto Increment of Staff Id
//            $table->integer('staff_id')->autoIncrement()->unique();

            #First Name
            $table->string('name');
            $table->string('last_name');

            #unique() method is used to avoid same data in the list of row or column
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->unique();

            $table->date('hire_date');
            $table->string('job_id');
            $table->integer('manager_id');
            $table->integer('department_id');
            $table->string('category_employee')->comment('0:Full Time, 1:Part Time, 2:Contract, 3:Temporary');

            //Details of Employee
            $table->string('bank_acc')->unique();
            $table->string('bank_name');
            $table->string('epf_no')->unique();
            $table->string('pcb_no')->unique();
            $table->string('ic_no')->unique();

            #For Role
            $table->tinyInteger('is_role')->default(1)->comment('0: Employee, 1: HR');

            #nullable() method is used to allow null values for the column
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            //Record of Created Date and Updated Date
            $table->timestamps();

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
