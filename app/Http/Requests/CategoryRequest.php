<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
    public function rules(Request $request)
    {
        switch ($this->method()) {
            case 'POST':
                if ($this->segment(2)) {
                    return [
                        //
                        'name' => 'required|unique:category,id,'.$request->segment(2),
                        'logo' => 'required|file|mimetypes:image/png,image/jpeg',
                    ];
                }else{
                    return [
                        //
                        'name' => 'required|unique:category',
                        'logo' => 'required|file|mimetypes:image/png,image/jpeg',
                    ];
                }
                break;
            default :
                break;
        }
    }


}
