<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Resources\CutiedKaryawanResource;
use App\Http\Resources\FirstThreeKaryawanResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cutiedKaryawan = Cuti::distinct('karyawan_id')->pluck('karyawan_id');
        $karyawans = Karyawan::all();
        $sisaCuti = $karyawans->map(function ($karyawan) {
            // dd($karyawan->cuti()->sum('lama_cuti'));
            $jumlah_cuti = $karyawan->cuti()->sum('lama_cuti');
            $sisa_cuti = 12 - $jumlah_cuti;

            return [
                'no_induk' => $karyawan->no_induk,
                'nama' => $karyawan->nama,
                'sisa_cuti' => $sisa_cuti,
            ];

        });

        $first3karyawan = Karyawan::all()->sortBy('tgl_bergabung')->take(3);
        $cutiedKaryawan = Karyawan::whereIN('id', $cutiedKaryawan)->get();

        return view('dashboard',[
            'title' => "Dashboard",
            'first3karyawan' => new FirstThreeKaryawanResource($first3karyawan),
            'cutiedKaryawan' => new CutiedKaryawanResource($cutiedKaryawan),
            'sisaCuti' => $sisaCuti
        ]);
    }
}
