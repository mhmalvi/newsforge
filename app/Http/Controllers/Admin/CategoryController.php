<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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
    public function getAll(){
        return new CategoryResource(Category::orderBy('created_at', 'desc')->get());
    }

    /**
     * 
     */
    public function getAllSub(){
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
                    ];
                    $store = SubCategory::create($data);
                }
                else{
                    $data = [
                        'category' => $request->category,
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
}
