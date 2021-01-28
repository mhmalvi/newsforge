<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     *
     */
    public function profileSettings(){
        return view('admin.pages.profile');
    }

    /**
     *
     */
    public function webSettings(){
        return view('admin.pages.website');
    }

    /**
     *
     */
    public function adminSettings(){
        return view('admin.pages.admin');
    }

    /**
     *
     */
    public function seoSettings(){
        return view('admin.pages.seo');
    }
}
