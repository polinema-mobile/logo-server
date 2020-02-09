<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'admob_app_id' => $this->admob_app_id,
            'admob_banner_id' => $this->admob_banner_id,
            'admob_inters_id' => $this->admob_inters_id,
            'admob_rewarded_id' => $this->admob_rewarded_id
        ];
    }
}
