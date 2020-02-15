<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $table = "config";
    protected $fillable = [
        "admob_app_id",
        "admob_banner_id",
        "admob_inters_id",
        "admob_rewarded_id",
        "app_name",
        "ads_enable",
        "banner_enable",
        "inters_enable",
        "rewarded_enable",
        "promote_enable",
        "promote_url",
        "promote_image"
    ];

}
