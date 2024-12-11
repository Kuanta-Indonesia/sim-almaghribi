<?php

namespace App\Models;

use App\Models\KpiPerformance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiInstrument extends Model
{
    use HasFactory;
    /**
     * Get all of the performance for the KpiInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function performance()
    {
        return $this->hasMany(KpiPerformance::class);
    }
    
}
