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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tenant_id")->constrained("tenants")->cascadeOnDelete();
            $table->foreignId("patient_id")->constrained("patients")->cascadeOnDelete();
            $table->string("prescription_name");
            $table->dateTime("prescription_date")->useCurrent();
            $table->enum("status" , ["pending" , "partially_dispensed" , "fully_dispensed" , "cancelled"])->default("pending");
            $table->foreignId("created_by")->nullable()->constrained("users")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
