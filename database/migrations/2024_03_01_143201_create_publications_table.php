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
        Schema::create('publications', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('photo')->nullable();
        $table->integer('year')->nullable();
        $table->text('student_details')->nullable();
        $table->string('university')->nullable();
        $table->string('department')->nullable();
        $table->string('scholar_link')->nullable();
        $table->string('supervisor')->nullable();
        $table->softDeletes();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
