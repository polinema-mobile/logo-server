<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $fileName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads'), $fileName);
        $category = Category::create([
            'name'=>$request->name,
            'logo'=>$fileName
        ]);
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {

        $fileName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads'), $fileName);
        $oldFileName = $category->logo;
        $oldFilePath = public_path('/uploads/').$oldFileName;
        unlink($oldFilePath);
        $category->update($request->only([
            'name',
            'logo',
        ]));

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $fileName = public_path('/uploads/').$category->logo;
        unlink($fileName);
        $category->delete();
        return response()->json(new CategoryResource($category), 200);
    }
}
