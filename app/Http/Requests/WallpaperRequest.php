<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class WallpaperRequest extends FormRequest
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
                        'wallpaper_name' => 'required|unique:wallpaper,id,'.$request->segment(2),
                        'url' => 'required|file|mimetypes:image/png,image/jpeg',
                    ];
                }else{
                    return [
                        //
                        'wallpaper_name' => 'required|unique:wallpaper',
                        'url' => 'required|file|mimetypes:image/png,image/jpeg',
                    ];
                }
                break;
            default :
                break;
        }
    }
}
