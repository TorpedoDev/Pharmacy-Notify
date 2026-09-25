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
        Schema::create('dispensations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tenant_id")->constrained("tenants")->cascadeOnDelete();
            $table->foreignId("patient_id")->constrained("patients")->cascadeOnDelete();
            $table->foreignId("prescription_id")->nullable()->constrained("prescriptions")->cascadeOnDelete();
            $table->dateTime("dispensed_at")->useCurrent();
            $table->enum("type" , ["prescription" , "refill" , "walk_in"]);
            $table->enum("status" , ["completed" , "cancelled"])->default("completed");
            // $table->decimal("sub_total");
            // $table->decimal("discount");
            // $table->decimal("total");
            $table->foreignId("created_by")->nullable()->constrained("users")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensations');
    }
};
