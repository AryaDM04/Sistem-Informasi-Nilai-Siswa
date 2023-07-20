<?php

namespace App\Http\Requests\mata_pelajaran;

use Illuminate\Foundation\Http\FormRequest;

class MataPelajaranUpdateRequest extends FormRequest
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
            "id" => "required|exists:mata_pelajarans,id",
            "pelajaran" => "required|unique:mata_pelajarans,pelajaran",
        ];
    }
}
