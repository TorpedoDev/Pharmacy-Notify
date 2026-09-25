<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissingMedication extends Model
{
    protected $fillable = ["name" , "status" , "created_by" , "tenant_id"];

    public function addedBy()
    {
        return $this->belongsTo(User::class , "created_by");
    }
}
