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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string("buildingNum", 255)->unique();
            $table->string("buildingName", 255)->nullable();
            $table->string("buildingType", 255)->nullable();
            $table->string("projectName", 255)->nullable();
            $table->string("city", 255)->nullable();

            //مكونات العقار
            $table->string("buildingIn", 255)->nullable();

            //المالك وهاتفه
            $table->string("ownerName", 255)->nullable();
            $table->string("ownerPhone", 255)->nullable();

            //الوكيل وهاتفه
            $table->string("agentName", 255)->nullable();
            $table->string("agentPhone", 255)->nullable();

            //رقم الوكاله وتاريخ انتهائها
            $table->string("agencyNum", 255)->nullable();
            $table->string("agencyDate", 255)->nullable();

            //الوسيط ورقم هاتفه
            $table->string("mediatorName", 255)->nullable();
            $table->string("mediatorPhone", 255)->nullable();

            //المسؤول وهاتفه
            $table->string("Administrator", 255)->nullable();
            $table->string("AdministratorPhone", 255)->nullable();

            //تفاصيل ونوع ومدة وقيمه العقد وتاريخ بدايته وانتهائه وصوره منه
            $table->string("contractType", 255)->nullable();
            $table->string("contractTime", 255)->nullable();
            $table->string("contractDetails", 255)->nullable();
            $table->string("contractValue", 255)->nullable();
            $table->string("contractStart", 255)->nullable();
            $table->string("contractEnd", 255)->nullable();
            $table->string("rentStart", 255)->nullable();
            $table->string("rentEnd", 255)->nullable();
            $table->string("rentValue", 255)->nullable();
            $table->string("rentTime", 255)->nullable();
            $table->string("contractPDF", 255)->nullable();
            $table->string("checkbox", 255)->nullable();
            $table->string("checkboxPDF", 255)->nullable();
            $table->text("textArea", 255)->nullable();

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
        Schema::dropIfExists('contracts');
    }
};
