<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetugasRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harap terisi!',
            'password.required' => 'Password harap terisi!',
            'nama_petugas.required' => 'Nama Petugas harap terisi!',
            'level.required' => 'Level harap dipilih!',
        ];
    }
}
