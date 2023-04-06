<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nisn.required' => 'NISN harap terisi!',
            'nis.required' => 'NIS harap terisi!',
            'nama.required' => 'Nama harap terisi!',
            'id_kelas.required' => 'Kelas harap dipilih!',
            'alamat.required' => 'Alamat harap terisi!',
            'no_telp.required' => 'No Telepon harap terisi!',
            'id_spp.required' => 'ID SPP harap terisi!'
        ];
    }
}
