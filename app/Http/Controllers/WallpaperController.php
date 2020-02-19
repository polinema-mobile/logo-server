<?php

namespace App\Http\Controllers;

use App\Http\Requests\WallpaperRequest;
use App\Http\Resources\WallpaperResource;
use App\Wallpaper;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wallpaper = Wallpaper::all();
        return WallpaperResource::collection($wallpaper);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WallpaperRequest $request)
    {
        $fileName = time() . '.' . $request->url->extension();
        $request->url->move(public_path('uploads/wallpaper'), $fileName);
        $wallpaper = Wallpaper::create([
            'wallpaper_name' => $request->wallpaper_name,
            'url' => $fileName,
            'fk_category'=>$request->fk_category
        ]);
        return new WallpaperResource($wallpaper);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallpaper $wallpaper)
    {
        //
        $fileName = public_path('/uploads/wallpaper') . $wallpaper->url;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $wallpaper->delete();
        return response()->json(new WallpaperResource($wallpaper), 200);
    }
}
