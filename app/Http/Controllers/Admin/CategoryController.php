<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     *
     */
    public function index(){
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    /**
     * 
     */
    public function getAllCategories(){
        return new CategoryResource(Category::orderBy('created_at', 'desc')->get());
    }

    /**
     * 
     */
    public function getAllSubcategories(){
        return new CategoryResource(SubCategory::orderBy('created_at', 'desc')->get());
    }

    /**
     * 
     */
    public function store(Request $request){
        if ($request->expectsJson()){
            try{
                if($request->filled('category_id')){
                    $data = [
                        'sub-category' => $request->category,
                        'category_id' => $request->category_id,
                        'user_id' => Auth::id()
                    ];
                    $store = SubCategory::create($data);
                }
                else{
                    $data = [
                        'category' => $request->category,
                        'user_id' => Auth::id()
                    ];
                    $store = Category::create($data);
                }
                $response = [
                    'resp' => $store,
                    'status' => 200
                ];

                return new CategoryResource($response);

            }catch(\Throwable $th){
                $response = [
                    'status' => $th->getMessage()
                ];

                return new CategoryResource($response);
            }
        }
    }

    /**
     * 
     */
    public function removeCategories(Request $request){
        $arr = $request->id;
        $csv = implode(", ", $arr);

        $delete = DB::delete("DELETE FROM categories WHERE id IN ($csv)");

        if ($delete) {
            return new CategoryResource(['response' => $delete, 'status' => 200]);
        }
    }


    /**
     * 
     */
    public function removeSubcategories(Request $request){
        $arr = $request->id;
        $csv = implode(", ", $arr);

        $delete = DB::delete("DELETE FROM sub_categories WHERE id IN ($csv)");

        if ($delete) {
            return new CategoryResource(['response' => $delete, 'status' => 200]);
        }
    }
}
