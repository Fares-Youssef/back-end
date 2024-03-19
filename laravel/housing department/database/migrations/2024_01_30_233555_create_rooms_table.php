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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('collectionId',255)->nullable();
            $table->string('buildingId',255)->nullable();
            $table->string('apartmentNum',255)->nullable();
            $table->string('roomNum',255)->nullable();
            $table->string('floorNum',255)->nullable();
            $table->string('count',255)->nullable();
            $table->string('file',255)->nullable();
            $table->string('active',255)->nullable();
            $table->string('attach',255)->nullable();
            $table->string('other',255)->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
