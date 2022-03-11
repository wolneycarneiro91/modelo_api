<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EsqueletoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['estrutura'=>'min:5'];
    }
}
