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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('student_id')->unique()->nullable();
        $table->string('first_name',100);
        $table->string('middle_name',100)->nullable();
        $table->string('last_name',100);
        $table->date('date_of_birth');
        $table->string('email')->unique();
        $table->string('gender', 10);
        $table->string('course', 100);
        $table->string('year_level', 10);
        $table->timestamps();

        $table->index('student_id');
        $table->index('email');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
