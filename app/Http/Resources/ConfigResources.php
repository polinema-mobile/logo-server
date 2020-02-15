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
            'admob_rewarded_id' => $this->admob_rewarded_id,
            'app_name' => $this->app_name,
            'ads_enable' => $this->ads_enable,
            'banner_enable' => $this->banner_enable,
            'inters_enable' => $this->inters_enable,
            'rewarded_enable' => $this->rewarded_enable,
            'promote_enable' => $this->promote_enable,
            'promote_url' => $this->promote_url,
            'promote_image' => $this->promote_image,
        ];
    }
}
