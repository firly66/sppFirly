<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pegawai'] = Petugas::get();
        return view('petugas.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetugasRequest $request)
    {
        $pegawai = new Petugas();
        $pegawai->username = $request->username;
        $pegawai->password = bcrypt($request->password);
        $pegawai->nama_petugas = $request->nama_petugas;
        $pegawai->level = $request->level;
        $pegawai->save();

        return redirect('pegawai')->with('success', 'Petugas baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, Petugas $pegawai)
    {
        $pegawai->update($request->all());

        return redirect('pegawai')->with('success', 'Petugas terpilih berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $pegawai)
    {
        $pegawai->delete();

        return redirect('pegawai')->with('success', 'Petugas terpilih berhasil dihapus!');
    }
}
