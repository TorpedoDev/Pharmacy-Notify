<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTreatment extends Model
{
    protected $fillable = ["tenant_id" , "patient_id" , "medication_id" , "prescription_item_id" , "dosage" , "frequency" , "quantity_per_cycle" , "cycle_days" , "last_dispensed_at" , "next_refill_date" , "refill_enabled" , "reminder_enabled"];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medication()
    {
        return $this->hasOne(Medication::class);
    }

    public function prescriptionItems()
    {
        return $this->hasMany(PrescriptionItem::class , "prescription_item_id");
    }
}
