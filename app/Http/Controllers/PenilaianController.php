<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\KpiInstrument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $admin = Role::where('nama', 'admin')->first();
        $user = User::where('role_id', '!=', $admin->id)->get();
        return inertia('Create-Penilaian',[
            'kpi' => $kpi,
            'user' => $user
        ]);
    }
    function edit($id) {

        $kpi = KpiInstrument::with(['performance', 'performance.score','performance.component'])->get();

        $admin = Role::where('nama', 'admin')->first();
        $user = User::where('role_id', '!=', $admin->id)->get();
        $kpiScore= Penilaian::with(['score','score.performance.score'])->find($id);
        return inertia('Edit-Penilaian',[
            'kpi' => $kpi,
            'user' => $user,
            'kpiScore' => $kpiScore
        ]);
    }
    function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'user' => 'required',
            'score' => 'required',
            'periode' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $penilaian = new Penilaian();
            $penilaian->user_id = $request->user;
            $penilaian->asesor_id = Auth::user()->id;
            $penilaian->kpi_score_id = $request->score;
            $penilaian->periode = date('Y') . '-' . $request->periode . '-01';
            $penilaian->save();
            DB::commit();
            return redirect()->route('penilaian.index')->withSuccess('Penilaian berhasil disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withError('Penilaian gagal disimpan');
        }

    }
    function update(Request $request,$id) {
        // dd($request->all());
        $request->validate([
            'user' => 'required',
            'score' => 'required',
            'periode' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $penilaian = Penilaian::find($id);
            $penilaian->user_id = $request->user;
            $penilaian->asesor_id = Auth::user()->id;
            $penilaian->kpi_score_id = $request->score;
            $penilaian->periode = date('Y') . '-' . $request->periode . '-01';
            $penilaian->save();
            DB::commit();
            return redirect()->route('penilaian.index')->withSuccess('Penilaian berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->withError('Penilaian gagal diubah');
        }

    }
}

