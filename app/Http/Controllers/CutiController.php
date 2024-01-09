<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Http\Resources\CutiResource;
use App\Http\Requests\StoreCutiRequest;
use App\Http\Requests\UpdateCutiRequest;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuties = new CutiResource(Cuti::all());
        
        return view('cuti',[
            "title" => "Tabel Cuti",
            "cuties" => $cuties
        ]);
    }

}
