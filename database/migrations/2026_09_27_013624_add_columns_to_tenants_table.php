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
        Schema::table('tenants', function (Blueprint $table) {
        $table->string('owner_name')->nullable();    
        $table->string('whatsapp_waba_id')->nullable();
        $table->string('whatsapp_phone_number_id')->nullable();
        $table->string('whatsapp_business_id')->nullable();
        $table->text('whatsapp_access_token')->nullable();
        $table->boolean('whatsapp_connected')->default(false);
        $table->timestamp('whatsapp_token_expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            //
        });
    }
};
