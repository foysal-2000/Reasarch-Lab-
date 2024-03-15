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
        Schema::create('almuni_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('university');
            $table->string('department');
            $table->string('scholar_link')->nullable();
            $table->string('linkdin')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almuni_students');
    }
};
