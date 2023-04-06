<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSppRequest extends FormRequest
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
            'tahun' => 'required',
            'nominal' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tahun.required' => ' Tahun harap terisi!',
            'nominal.required' => 'Nominal harap terisi!'
        ];
    }
}
