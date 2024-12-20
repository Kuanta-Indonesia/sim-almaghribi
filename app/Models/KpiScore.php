<?php

namespace App\Models;

use App\Models\KpiPerformance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiScore extends Model
{
    protected $guarded = [];

    use HasFactory;
    /**
     * Get the performance that owns the KpiScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function performance()
    {
        return $this->belongsTo(KpiPerformance::class, 'kpi_performance_id', 'id', 'kpi_performances');
    }
}
