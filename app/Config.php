<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $table = "config";
    protected $fillable =["admob_app_id","admob_banner_id","admob_inters_id","admob_rewarded_id"];

}
