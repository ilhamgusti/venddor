<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyekRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama_proyek'=>'required|string',
            'tanggal_pengerjaan'=>'required|date',
            'estimasi'=>'required|integer',
            'file_url'=>'required|file|mimes:xlsx,pdf,jpeg,jpg,png,xls,doc,docx',
            // 'status'=>'required|integer',
            'vendor_id'=>'sometimes|required|integer',
        ];
    }
}
