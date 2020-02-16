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
            'app_name'=>'required|unique:config',
            'ads_enable'=>'required',
            'banner_enable'=>'required',
            'inters_enable'=>'required',
            'rewarded_enable'=>'required',
            'promote_enable'=>'required',
            'promote_image'=>'required',
            'promote_url'=>'required',
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
            'app_name.required' => 'Nama APlikasi Harus di Isi',
            'app_name.unique' => 'Nama APlikasi Sudah Pernah Ada',
            'ads_enable.required' => 'Status Ads Harus di Isi',
            'banner_enable.required' => 'Status Banner Harus di Isi',
            'inters_enable.required' => 'Status Inters Harus di Isi',
            'rewarded_enable.required' => 'Status Rewarded Harus di Isi',
            'promote_enable.required' => 'Status Cross Promote Harus di Isi',
            'promote_image.required' => 'Image Cross Promote Harus di Isi',
            'promote_url.required' => 'Url Cross Promote Harus di Isi',
        ];

    }
}
