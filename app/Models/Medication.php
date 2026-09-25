<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Medication extends Model
{
    protected $fillable = ["name" , "tenant_id" , "created_by"];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class , "created_by");
    }

    public function dispensation_items()
    {
        return $this->hasMany(DispensationItem::class);
    }
}
