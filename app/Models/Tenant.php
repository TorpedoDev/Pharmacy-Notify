<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    // logo && commercial_number ------> nullable
    protected $fillable = ['name' , 'logo' , 'phone' , 'commercial_number' , 'owner_name' , 'whatsapp_waba_id' , 'whatsapp_phone_number_id' , 'whatsapp_business_id' , 'whatsapp_access_token' , 'whatsapp_connected' , 'whatsapp_token_expires_at'];

    protected $casts = ['whatsapp_token_expires_at' => 'datetime'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }

    public function dispensations()
    {
        return $this->hasMany(Dispensation::class);
    }
}
