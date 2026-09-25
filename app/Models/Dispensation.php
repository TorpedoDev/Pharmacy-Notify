<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispensation extends Model
{
    protected $fillable = ["tenant_id" , "patient_id" , "prescription_id" , "dispensed_at" , "type" , "status" , "created_by"];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

     public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

     public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class , "created_by");
    }

    public function items()
    {
        return $this->hasMany(DispensationItem::class);
    }
}
