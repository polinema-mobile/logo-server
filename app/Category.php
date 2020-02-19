<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";
    protected $fillable = [
        "id",
        "name",
        "logo"
    ];

    public function wallpaper()
    {
       return $this->hasMany(Wallpaper::class);
    }
}
