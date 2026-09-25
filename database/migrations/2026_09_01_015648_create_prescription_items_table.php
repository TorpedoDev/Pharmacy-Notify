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
        Schema::create('prescription_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("prescription_id")->constrained("prescriptions")->cascadeOnDelete();
            $table->foreignId("medication_id")->constrained("medications")->cascadeOnDelete();
            $table->string("dosage");
            $table->string("frequency");
            $table->unsignedInteger("duration_value")->nullable();
            $table->enum("duration_unit" , ["days" , "weeks" , "months"])->nullable();
            $table->decimal("prescribed_quantity" , 10 , 2);
            $table->boolean("is_chronic")->default(false);
            $table->boolean("refill_enabled")->default(false);
            $table->unsignedInteger("refill_cycle_days")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_items');
    }
};
