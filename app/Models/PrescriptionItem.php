<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model
{
    protected $fillable = ["prescription_id" , "medication_id" , "dosage" , "frequency" , "duration_value" , "duration_unit" , "prescribed_quantity" , "is_chronic" , "refill_enabled" , "refill_cycle_days"];

    // public function prescription()
    // {
    //     return $this->belongsTo(Prescription::class);
    // }

    // public function medication()
    // {
    //     return $this->hasOne(Medication::class);
    // }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function dispensations()
    {
        return $this->hasMany(DispensationItem::class);
    }

    public function patientTreatment()
    {
        return $this->hasOne(PatientTreatment::class);
    }
}
