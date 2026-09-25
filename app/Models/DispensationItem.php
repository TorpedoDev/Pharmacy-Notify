<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispensationItem extends Model
{
    protected $fillable = ["dispensation_id" , "prescription_item_id" , "medication_id" , "quantity"];

    public function dispensation()
    {
        return $this->belongsTo(Dispensation::class);
    }

     public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
