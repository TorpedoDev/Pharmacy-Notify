<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ["tenant_id" , "patient_code" , "name" , "phone" , "whatsapp_number" , "age" , "address" , "status" , "created_by"];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class , "created_by");
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

     public function dispensations()
    {
        return $this->hasMany(Dispensation::class);
    }
}
