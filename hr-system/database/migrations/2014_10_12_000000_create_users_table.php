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
            $table->string('name');

            #unique() method is used to avoid same data in the list of row or column
            $table->string('email')->unique();

            #nullable() method is used to allow null values for the column
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            #For Role
            $table->tinyInteger('is_role')->default(1)->comment('0: Employee, 1: HR');
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
