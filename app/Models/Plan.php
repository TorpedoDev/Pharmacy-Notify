<?php

namespace App\Models;

use App\Enums\PeriodTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Override;

class Plan extends Model
{
    protected $fillable = ['name' , 'price' , 'allowed_users' , 'allowed_customers' , 'period_value' , 'period_type' , 'is_active' , 'features' , 'is_popular'];

    #[Override]
    protected function casts()
    {
                return [
                    'period_type' => PeriodTypes::class
                ];

    }

    public function calculateEndDate(Carbon $startDate): Carbon
{
    return match ($this->period_type) {

        PeriodTypes::Days =>
            $startDate->copy()->addDays($this->period_value),

        PeriodTypes::Months =>
            $startDate->copy()->addMonthsNoOverflow($this->period_value),

        PeriodTypes::Years =>
            $startDate->copy()->addYearsNoOverflow($this->period_value),
    };
}

}
