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
        Schema::create('gives', function (Blueprint $table) {
            $table->id();
            $table->string('clientName',255)->nullable();
            $table->string('code',255)->nullable();
            $table->string('count',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('total',255)->nullable();
            $table->string('date',255)->nullable();
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
        Schema::dropIfExists('gives');
    }
};
