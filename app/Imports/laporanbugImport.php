<?php

namespace App\Imports;

use App\Models\laporanbug;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class laporanbugImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new laporanbug([
            'jenis'=> $row['jenis'],
            'deskripsi' => $row['deskripsi'],
            'tglkejadian' => $row['tglkejadian'],
            'pelapor' => $row['pelapor'],
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
