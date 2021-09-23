<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatrixMultiplicationRequest extends FormRequest
{
    public function authorize() { return true;}

    public function rules()
    {
        return [
            'matrix1' => 'required|array',
            'matrix2' => 'required|array'
        ];
    }
}