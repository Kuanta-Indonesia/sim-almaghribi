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
        if (!is_int($request->instrument)) {
            $kpi = new KpiInstrument();
            $kpi->nama = $request->instrument;
            $kpi->deskripsi = $request->deskripsiInstrument;
            $kpi->save();
        }else{
            $kpi = KpiInstrument::find($request->instrument);
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
            return response()->json(['error'=>'An error occurred while saving data.']); 
        }
    }
    function edit($id) {
        // $kpi = KpiInstrument::with(['performance', 'performance.score','performance.component'])->find($id);
        $kpi = KpiPerformance::with(['score','component','instrument'])->find($id);
        $kpiAll = KpiInstrument::all();
        return inertia('Edit-Kpi',[
            'kpi' => $kpi,
            'kpiAll' => $kpiAll
        ]);
    }
    function update(Request $request,$id) {
        $request->validate([
            'instrument' => 'required',
            'komponen' => 'required',
            'scores' => 'required',
            'performance'=>'required',
        ]);
        DB::beginTransaction();

        try {
        $kpiPerformance = KpiPerformance::find($id);
        if (is_int($request->instrument)) {
            $kpiPerformance->kpi_instrument_id = $request->instrument;
        }else{
            KpiInstrument::find($kpiPerformance->kpi_instrument_id)->update([
                'nama' => $request->instrument,
                'deskripsi' => $request->deskripsiInstrument
            ]);
        }
       
        $kpiPerformance->value = $request->performance;
        $kpiPerformance->save();
        KpiComponent::where('kpi_performance_id',$id)->delete();
        KpiScore::where('kpi_performance_id',$id)->delete();
        foreach ($request->komponen as $item) {
            # code...
            $kpiComponent = new KpiComponent();
            $kpiComponent->kpi_performance_id = $kpiPerformance->id;
            $kpiComponent->value = $item['value'];
            $kpiComponent->save();
        }
        foreach ($request->scores as $item) {
            # code...
            $kpiScore = new KpiScore();
            $kpiScore->kpi_performance_id = $kpiPerformance->id;
            $kpiScore->value = $item['value'];
            $kpiScore->deskripsi = $item['deskripsi'];
            $kpiScore->save();
        }
        DB::commit();
        return redirect()->route('kpi.index')->with('success', 'Data updated successfully.');
    } catch (Exception $e) {
        DB::rollBack();
        // Handle the exception, for example, log the error or return an error response
        return redirect()->route('kpi.index')->with('error', 'An error occurred while updating data.');
        
    }
}
    function destroy($id) {
        try {
            //code...
            DB::beginTransaction();

            $kpiPerformance = KpiPerformance::find($id);
            foreach ($kpiPerformance->score as $score) {
                $score->delete();
            }
            foreach ($kpiPerformance->component as $component) {
                $component->delete();
            }
            $kpiPerformance->delete();
            DB::commit();
            return redirect()->route('kpi.index')->with('success', 'Data deleted successfully.');

        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollBack();
            // Handle the exception, for example, log the error or return an error response
            return redirect()->back()->with('error', 'Kpi sudah digunakan. jika tidak maka hubungi admin');
            }
        }
    }
