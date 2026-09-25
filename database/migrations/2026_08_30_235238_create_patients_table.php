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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tenant_id")->constrained("tenants")->cascadeOnDelete();
            $table->string("patient_code");
            $table->string("name");
            $table->string("phone");
            $table->string("whatsapp_number")->nullable();
            $table->integer("age");
            $table->string("address")->nullable();
            $table->boolean("status")->default(true);
            $table->foreignId("created_by")->nullable()->constrained("users")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
