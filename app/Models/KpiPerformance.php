<?php

namespace App\Models;

use App\Models\KpiScore;
use App\Models\KpiComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiPerformance extends Model
{
    use HasFactory;
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
}
