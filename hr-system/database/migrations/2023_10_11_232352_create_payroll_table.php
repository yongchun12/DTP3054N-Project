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
        Schema::create('payroll', function (Blueprint $table) {

            $table->id();
            $table->string('employee_id');

            //The amount of money an employee receives from a company before any deductions
            //Maybe can retrieve from users table
            $table->double('gross_salary');

            //Need to take the gross salary and divide by 22 days and multiply by the number of days worked
            //Maybe make it readable
            $table->integer('number_of_day_work');

            //Just direct add the amount, not percentage
            $table->double('bonus')->nullable();

            //Need to take the gross salary and divide by 22 days and divide 8 hours and divide the overtime hours
            $table->double('overtime_hours')->nullable();

            //Deduction got EPF, SOCSO, PCB
            //When user type for the absent days, it will automatically take 22 days and minus this input and output in the number of day work
            $table->integer('absent_days');

            //Medical Allowance, Other Allowance should add with the gross salary
            $table->double('medical_allowance')->nullable();
            $table->double('other_allowance')->nullable();

            //Take from the absent days
            $table->double('total_deductions');

            //Total Salary
            $table->double('payroll_monthly');

            #Create created_at and updated_at column
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};
