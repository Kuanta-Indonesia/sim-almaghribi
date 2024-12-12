<?php

namespace App\Http\Controllers;

use App\Models\KpiScore;
use App\Models\KpiComponent;
use Illuminate\Http\Request;
use App\Models\KpiInstrument;
use App\Models\KpiPerformance;
use Illuminate\Support\Facades\DB;

class KpiController extends Controller
{
    //
    function index() {
        $kpi = KpiInstrument::with(['performance', 'performance.score','performance.component'])->get();
        return inertia('Kpi', ['kpi' => $kpi]);
    }
    function create() {

        $kpi = KpiInstrument::all();
        return inertia('Create-Kpi', ['kpi' => $kpi]);
    }
    function store(Request $request) {
        $request->validate([
            'instrument' => 'required',
            'komponen' => 'required',
            'scores' => 'required',
            'performance'=>'required',
        ]);
        DB::beginTransaction();

        try {
        $kpi = KpiInstrument::find($request->instrument);
        if(!$kpi) {
            $kpi = new KpiInstrument();
            $kpi->nama = $request->instrument;
            $kpi->deskripsi = $request->deskripsiInstrument;
            $kpi->save();
        }
        $kpiPerformance = new KpiPerformance();
        $kpiPerformance->kpi_instrument_id = $kpi->id;
        $kpiPerformance->value = $request->performance;
        $kpiPerformance->save();
        foreach ($request->komponen as $item) {
            # code...
            $kpiComponent = new KpiComponent();
            $kpiComponent->kpi_performance_id = $kpiPerformance->id;
            $kpiComponent->value = $item['komponen'];
            $kpiComponent->save();
        }
        foreach ($request->scores as $item) {
            # code...
            $kpiScore = new KpiScore();
            $kpiScore->kpi_performance_id = $kpiPerformance->id;
            $kpiScore->value = $item['score'];
            $kpiScore->deskripsi = $item['deskripsi'];
            $kpiScore->save();
        }
        DB::commit();
        return redirect()->route('kpi.index')->with('success', 'Data saved successfully.');
    } catch (Exception $e) {
        DB::rollBack();
        dd($e);
        // Handle the exception, for example, log the error or return an error response
        return response()->json(['errors'=>'An error occurred while saving data.']); 
    }
    }
    function edit($id) {
    }
}
