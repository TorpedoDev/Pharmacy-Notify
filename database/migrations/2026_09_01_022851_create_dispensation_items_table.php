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
        Schema::create('dispensation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("dispensation_id")->constrained("dispensations")->cascadeOnDelete();
            $table->foreignId("prescription_item_id")->nullable()->constrained("prescription_items")->nullOnDelete();
            $table->foreignId("medication_id")->constrained("medications")->cascadeOnDelete();
            // $table->foreignId("stock_id")->constrained("stocks")->cascadeOnDelete();
            $table->decimal("quantity");
            // $table->decimal("unit_price");
            // $table->decimal("discount");
            // $table->decimal("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensation_items');
    }
};
