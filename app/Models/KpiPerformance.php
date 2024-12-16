<?php

namespace App\Models;

use App\Models\KpiScore;
use App\Models\KpiComponent;
use App\Models\KpiInstrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiPerformance extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the component for the KpiPerformance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function component()
    {
        return $this->hasMany(KpiComponent::class);
    }
    /**
     * Get all of the score for the KpiPerformance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function score()
    {
        return $this->hasMany(KpiScore::class);
    }
    /**
     * Get the instrument that owns the KpiPerformance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrument() 
    {
        return $this->belongsTo(KpiInstrument::class, 'kpi_instrument_id', 'id', 'instrument');
    }
   
}
