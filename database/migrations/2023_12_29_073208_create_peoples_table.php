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
            Schema::create('peoples', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('age');
                $table->string('gender');
                $table->string('mobileno');
                $table->string('accessibility');
                $table->foreignId('officer_id')->constrained('users','userID');
                $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peoples');
    }
};
