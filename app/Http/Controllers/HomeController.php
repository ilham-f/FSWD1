<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Cuti;
use Carbon\Carbon;

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
        $employees = Karyawan::with('cuti')->get();
        $sisaCuti = $employees->map(function ($employee) {
            $yearOfJoin = Carbon::now()->diffInYears(Carbon::parse($employee->tgl_bergabung));
            // dd($yearOfJoin);
            $takenLeaveDays = $employee->cuti->count();
            $remainingLeaveDays = 12*$yearOfJoin - $takenLeaveDays;

            return [
                'no_induk' => $employee->no_induk,
                'nama' => $employee->nama,
                'sisa_cuti' => $remainingLeaveDays,
            ];
        });

        return view('dashboard',[
            'title' => "Dashboard",
            'first3karyawan' => Karyawan::all()->sortBy('tgl_bergabung')->take(3),
            'cutiedKaryawan' => Karyawan::whereIN('id', $cutiedKaryawan)->get(),
            'sisaCuti' => $sisaCuti
        ]);
    }
}
