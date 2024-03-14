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
        Schema::create('dues', function (Blueprint $table) {
            $table->id();
            $table->string("contractNum",20)->nullable();
            $table->string("dueDate",250)->nullable();
            $table->string("dueInstallment",250)->nullable();
            // $table->integer("pay",250)->nullable();
            $table->bigInteger("pay")->nullable();
            $table->string("dueData",250)->nullable();
            $table->string("duePdf",250)->nullable();
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
        Schema::dropIfExists('dues');
    }
};
