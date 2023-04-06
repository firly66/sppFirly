<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['spp'] = Spp::get();
        return view('spp.index')->with($data);
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
     * @param  \App\Http\Requests\StoreSppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSppRequest $request)
    {
        Spp::create($request->all());

        return redirect('spp')->with('success', 'Data SPP baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSppRequest  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSppRequest $request, Spp $spp)
    {
        $spp->update($request->all());

        return redirect('spp')->with('success', 'Data SPP terpilih berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spp $spp)
    {
        $spp->delete();

        return redirect('spp')->with('success', 'Data SPP terpilih berhasil dihapus!');
    }
}
