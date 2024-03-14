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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string("subNum",255)->index();
            $table->string("locationName",255)->nullable();
            $table->string("box",255)->nullable();
            $table->string("room",255)->nullable();
            $table->string("receipt",255)->nullable();
            $table->string("food",255)->nullable();
            $table->string("type",255)->nullable();
            $table->string("value",255)->nullable();
            $table->string("start",255)->nullable();
            $table->string("chef",255)->nullable();
            $table->string("signature",255)->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
};
