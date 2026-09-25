<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ["tenant_id" , "patient_id" , "prescription_name" , "prescription_date" , "status" , "created_by"];

     protected $casts = [
        'prescription_date' => 'datetime',
    ];
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

     public function addedBy()
    {
        return $this->belongsTo(User::class , "created_by");
    }

    public function items()
    {
        return $this->hasMany(PrescriptionItem::class);
    }

     public function dispensations()
    {
        return $this->hasMany(Dispensation::class);
    }

}
