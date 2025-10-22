<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
       // return $category;
       
        $categoryResource =  CategoryResource::collection($category)->resolve();
        return $categoryResource;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'category_en' => 'required|max:30',
        'category_fr' => 'max:30',
    ],
    [],
    ['category_en' => 'Category in English']);


    $category = array_filter([
        'en' => $request->category_en,
        'fr' => $request->category_fr,
        ]);

        Category::create([
        'category' => $category
        ]);

        return back()->withSuccess('Category created successfully!');

    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category->category[app()->getLocale()];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
