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
        Schema::create('patient_treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tenant_id")->constrained("tenants")->cascadeOnDelete();
            $table->foreignId("patient_id")->constrained("patients")->cascadeOnDelete();
            $table->foreignId("medication_id")->constrained("medications")->cascadeOnDelete();
            $table->foreignId("prescription_item_id")->nullable()->constrained("prescription_items")->nullOnDelete();
            $table->string("dosage");
            $table->string("frequency");
            $table->decimal("quantity_per_cycle" , 10 , 2);
            $table->unsignedInteger("cycle_days");
            $table->dateTime("last_dispensed_at")->nullable();
            $table->date("next_refill_date")->nullable();
            $table->boolean("refill_enabled")->default(true);
            $table->boolean("reminder_enabled")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_treatments');
    }
};
