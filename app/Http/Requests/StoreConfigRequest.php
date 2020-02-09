<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreConfigRequest extends FormRequest
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
            'admob_app_id' => 'required',
            'admob_banner_id' => 'required',
            'admob_inters_id' => 'required',
            'admob_rewarded_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
            'admob_app_id.required' => 'Application Id Harus di Isi',
            'admob_banner_id.required' => 'Banner Id Harus di Isi',
            'admob_inters_id.required' => 'Interstitial Id Harus di Isi',
            'admob_rewarded_id.required' => 'Rewarded Id Harus di Isi',
        ];

    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
