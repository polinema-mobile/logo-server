<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    //
    protected $table = "wallpaper";
    protected $fillable=[
        "wallpaper_name",
        "url",
        "fk_category"
    ];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
}
