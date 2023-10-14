<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JilidRequest extends FormRequest
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
            //
            'nama' => 'required',
            'page_berwarna' => 'required',
            'page_hitamPutih' => 'required',
            'exemplar' => 'required',
            'total' => 'required',
            'bukti_pembayaran' => 'required',
            'file' => 'required',

        ];
    }
}
