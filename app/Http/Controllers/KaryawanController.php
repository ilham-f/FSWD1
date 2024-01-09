<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Resources\KaryawanResource;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = new KaryawanResource(Karyawan::all());

        return view('karyawan',[
            "title" => "Tabel Karyawan",
            "karyawans" => $karyawans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'no_induk' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'tgl_lahir' => ['required'],
            'tgl_bergabung' => ['required']
        ]);

        $created = Karyawan::create($validated);

        if ($created) {
            return back()->with('success', 'Data berhasil ditambahkan!');
        }

        return back()->with('failed', 'Data gagal ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_induk' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'tgl_lahir' => ['required'],
            'tgl_bergabung' => ['required']
        ]);

        $karyawan = Karyawan::find($id);
        $updated = $karyawan->update($validated);

        if ($updated) {
            return back()->with('success', 'Data berhasil diubah!');
        }

        return back()->with('failed', 'Data gagal diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $deleted = $karyawan->delete();
        if ($deleted) {
            return back()->with('success', 'Data berhasil dihapus!');
        }

        return back()->with('failed', 'Data gagal dihapus!');
    }
}
