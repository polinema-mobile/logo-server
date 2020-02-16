<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreCategoryRequest extends FormRequest
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
            //
            'name' => 'required|unique:category',
            'logo' => 'required|file|mimetypes:image/png,image/jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Nama Category Harus di Isi',
            'name.unique'=>'Tidakboleh ada dua ketegori yang sama',
            'logo.required'=>'Logo Harus Diisi'
        ];
    }
}
