<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('peoples', function (Blueprint $table) {
            $table->boolean('form_delivered')->default(false);
        });
    }

    public function down()
    {
        Schema::table('peoples', function (Blueprint $table) {
            $table->dropColumn('form_delivered');
        });
    }
};
