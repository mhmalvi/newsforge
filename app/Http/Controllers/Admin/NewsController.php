<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     *
     */
    public function index(){
        return view('admin.news.news');
    }


    /**
     *
     */
    public function create(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.news.createNews', compact('categories', 'subcategories'));
    }


    /**
     *
     */
    public function store(Request $request){
        dd($request->all());
    }

    /**
     * 
     */
    public function removed(){
        return view('admin.news.trashedNews');
    }
}
