<?php

namespace App\Http\Controllers\interface\wali_murid;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\MataPelajaran;
use App\Models\NilaiTugasUlangan;
use App\Models\User;
use Illuminate\Http\Request;

class WaliMuridInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali_murid = auth()->user()->id;
        $murid = User::with(["wali_murid.murid.murid.kelas", "wali_murid.murid.murid.jurusan", "wali_murid.murid.murid.agama"])->find($wali_murid);
        $absensi = Absensi::with(["user", "jadwal_pelajaran.user", 'jadwal_pelajaran.mata_pelajaran'])->where("user_id", $murid->wali_murid->murid->id)->get();
        $data_absen = $absensi->groupBy("status")->map(function ($q) {
            return $q->count();
        });
        $nilai = NilaiTugasUlangan::with(["tugas_ulangan.jadwal_pelajaran.mata_pelajaran", "tugas_ulangan.jadwal_pelajaran.user"])->where("user_id", $murid->wali_murid->murid->id)->get();
        $raport = User::with("raport")->has("raport")->where("id", $murid->wali_murid->murid_id)->latest()->first();
        return inertia()->render("interface/wali_murid", [
            "murid" => $murid,
            "absensi" => $absensi,
            "nilai" => $nilai,
            "raport" => $raport,
            "data_absen" => $data_absen,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
