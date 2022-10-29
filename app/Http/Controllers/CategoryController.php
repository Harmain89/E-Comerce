<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link_active = "category";
        $data = Category::all();
        return view('admin.categories.category', [
            'data' => $data
        ]);
    }

    public function manage_category()
    {
        return view('admin.categories.manage_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = $request->post('category');
        $category_slug = $request->post('category_slug');

        $model = new Category();
        $model->category_name = $category;
        $model->category_slug = $category_slug;
        $model->save();

        return [
            "msg"=>"Category ( ".$category." ) has been saved!",
        ];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $cat_id = $request->togetid;
        $category_name = $request->category_name;
        $category_slug = $request->category_slug;

        DB::table('categories')
              ->where('id', $cat_id)
              ->update([
                'category_name' => $category_name,
                'category_slug' => $category_slug,
              ]);

        return [
            "msg" => "Category ( ".$category_name." ) has been Updated!",
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function delete(Request $request)
    {
        $row_id = $request->row_id;
        $category_name = $request->category_name;

        $model = Category::find($row_id)->delete();

        return [
            "msg" => $category_name . " has been deleted!"
        ];
    }
}
