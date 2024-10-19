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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string("buildingNum")->unique();
            $table->string("buildingName")->nullable();
            $table->string("buildingType")->nullable();
            $table->string("projectName")->nullable();
            $table->string("city")->nullable();
            $table->string("buildingIn")->nullable();
            $table->string("ownerName")->nullable();
            $table->string("ownerPhone")->nullable();
            $table->string("agentName")->nullable();
            $table->string("agentPhone")->nullable();
            $table->string("agencyNum")->nullable();
            $table->string("agencyDate")->nullable();
            $table->string("mediatorName")->nullable();
            $table->string("mediatorPhone")->nullable();
            $table->string("Administrator")->nullable();
            $table->string("AdministratorPhone")->nullable();
            $table->string("contractType")->nullable();
            $table->string("contractTime")->nullable();
            $table->string("contractDetails")->nullable();
            $table->string("contractValue")->nullable();
            $table->string("contractStart")->nullable();
            $table->string("contractEnd")->nullable();
            $table->string("rentStart")->nullable();
            $table->string("rentEnd")->nullable();
            $table->string("rentValue")->nullable();
            $table->string("rentTime")->nullable();
            $table->string("contractPDF")->nullable();
            $table->string("checkbox")->nullable();
            $table->string("checkboxPDF")->nullable();
            $table->longText("textArea")->nullable();
            $table->integer("done")->default(0);
            $table->string("type")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
