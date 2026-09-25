<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['tenant_id' , 'plan_id' , 'start_at' , 'end_at'];

    public function plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class , 'tenant_id');
    }
}
