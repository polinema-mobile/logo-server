<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $fileName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads'), $fileName);
        $category = Category::create([
            'name' => $request->name,
            'logo' => $fileName
        ]);
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $fileName = $category->logo;
        $filePath = public_path("/uploads/") . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $fileName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads'), $fileName);

        $category->update([
            'name' => $request->name,
            'logo' => $fileName
        ]);

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $fileName = public_path('/uploads/') . $category->logo;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $category->delete();
        return response()->json(new CategoryResource($category), 200);
    }
}
