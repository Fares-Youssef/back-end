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
        Schema::create('cuts', function (Blueprint $table) {
            $table->id();
            $table->string('idNum',255)->nullable();
            $table->string('clientName',255)->nullable();
            $table->string('color',255)->nullable();
            $table->string('type',255)->nullable();
            $table->string('code',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('count',255)->nullable();
            $table->string('weight',255)->nullable();
            $table->string('num',255)->nullable();
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
        Schema::dropIfExists('cuts');
    }
};
