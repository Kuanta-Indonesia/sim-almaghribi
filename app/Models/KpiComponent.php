<?php

namespace App\Models;

use App\Models\KpiInstrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiComponent extends Model
{
    use HasFactory;
    /**
     * Get the instrument that owns the KpiComponent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrument()
    {
        return $this->belongsTo(KpiInstrument::class);
    }
}
