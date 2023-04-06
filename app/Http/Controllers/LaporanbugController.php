<?php

namespace App\Http\Controllers;

use App\Models\laporanbug;
use App\Http\Requests\StorelaporanbugRequest;
use App\Http\Requests\UpdatelaporanbugRequest;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\laporanbugExport;
use App\Imports\laporanbugImport;

class LaporanbugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['laporanbug'] = laporanbug::get();
        return view('laporanbug.index')->with($data);
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
     * @param  \App\Http\Requests\StorelaporanbugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelaporanbugRequest $request)
    {
        laporanbug::create($request->all());

        return redirect('laporanbug')->with('success', 'Laporan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporanbug  $laporanbug
     * @return \Illuminate\Http\Response
     */
    public function show(laporanbug $laporanbug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporanbug  $laporanbug
     * @return \Illuminate\Http\Response
     */
    public function edit(laporanbug $laporanbug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelaporanbugRequest  $request
     * @param  \App\Models\laporanbug  $laporanbug
     * @return \Illuminate\Http\Response
     */
    public function update(StorelaporanbugRequest $request, laporanbug $laporanbug)
    {
        // dd($laporanbug);
        // dd($request->all());
        $laporanbug->update($request->all());

        return redirect('laporanbug')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporanbug  $laporanbug
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporanbug $laporanbug)
    {
        $laporanbug->delete();

        return redirect('laporanbug')->with('success', 'Laporan berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new LaporanbugExport, $date.'_laporanbug.xlsx');
    }

    public function importData(){
        Excel::import(new laporanbugImport, request()->file('import'));
        return redirect()->route('laporanbug.index')->with('succes','Import data laporanbug berhasil!');
    }
}
