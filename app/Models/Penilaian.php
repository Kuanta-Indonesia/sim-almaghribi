<?php

namespace App\Models;

use App\Models\User;
use App\Models\KpiScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaians';
    protected $guarded = [];
    /**
     * Get the user that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id','users');
    }
    /**
     * Get the asesor  that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asesor()
    {
        return $this->belongsTo(User::class, 'asesor_id', 'id','users');
    }
    /**
     * Get the score that owns the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function score()
    {
        return $this->belongsTo(KpiScore::class, 'kpi_score_id', 'id', 'kpi_scores');   
    }
}
