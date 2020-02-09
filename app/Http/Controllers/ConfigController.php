<?php

namespace App\Http\Controllers;

use App\Config;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Resources\ConfigResources;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $config = Config::all();
        return ConfigResources::collection($config);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfigRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            $config = Config::create([
                'admob_app_id' => $request->admob_app_id,
                'admob_banner_id' => $request->admob_banner_id,
                'admob_inters_id' => $request->admob_inters_id,
                'admob_rewarded_id' => $request->admob_rewarded_id
            ]);

            return new ConfigResources($config);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Config $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Config $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Config $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Config $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
