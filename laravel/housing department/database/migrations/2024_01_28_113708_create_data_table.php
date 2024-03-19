<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string("num",255)->nullable();
            $table->string("name",255)->nullable();
            $table->string("job",255)->nullable();
            $table->string("idNum",255)->nullable();
            $table->string("city",255)->nullable();
            $table->string("location",255)->nullable();
            $table->string("nationality",255)->nullable();
            $table->string("status",255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
