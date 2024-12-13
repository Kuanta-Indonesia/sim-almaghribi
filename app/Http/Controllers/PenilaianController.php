<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\KpiInstrument;

class PenilaianController extends Controller
{
    //
    function index() {
        $penilaian = Penilaian::with(['user', 'asesor', 'score','score.performance','score.performance.component','score.performance.instrument'])->get();
        // dd($penilaian);
        return inertia('Penilaian', ['penilaian' => $penilaian]);
    }
    function create() {

        $kpi = KpiInstrument::with(['performance', 'performance.score','performance.component'])->get();
        return inertia('Create-Penilaian',[
            'kpi' => $kpi,
        ]);
            
    }
}
