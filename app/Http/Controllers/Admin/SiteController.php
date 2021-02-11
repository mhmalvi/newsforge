<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Settings;
use App\Models\Activation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class SiteController extends Controller
{
    /**
     *
     */
    public function profileSettings(){
        return view('admin.settings.profile');
    }

    /**
     * User Profile Update
     */
    public function profileUpdate(Request $request){
        try {
            $data = User::firstWhere('id', Auth::id());

            $data->name = $request->username;
            $data->email = $request->email;

            if($request->hasFile('file')){
                //delete old image
                Storage::delete('public/users/' . $data->photo);
                //check if directory exist or not
                if (!Storage::exists("public/users")) {
                    Storage::makeDirectory("public/users");
                }

                $image = $request->file('file');
                $imgExtension = $image->getClientOriginalExtension();

                $file = Auth::user()->name.'.'.$imgExtension;

                $data->photo = $file;

                //store image into storage directory
                Storage::putFileAs('public/users', $image, $file);
            }

            $data->save();

            $notification = [
                'message'   =>  'Profile successfully updated!',
                'alert-type'    =>  'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Throwable $th) {
            $notification = [
                // 'message'   =>  'oops! Something went wrong',
                'message'   =>  $th->getMessage(),
                'alert-type'    =>  'warning'
            ];

            return redirect()->back()->with($notification);
        }
    }

    /**
     *
     */
    public function webSettings(){
        $maintenance = Activation::firstWhere('type', 'maintenance');
        return view('admin.settings.website', compact('maintenance'));
    }


    /**
     * Toggle Maintenance
     */
    public function toggleMaintenance(Request $request){
        try{
            $notification = [];

            if($request->filled('status') && $request->id == 'on'){
                $status = $request->status;
                $type = Activation::where('type', 'maintenance')->firstOrFail();
                $notification = [];

                if($status && !$type->status){
                    Artisan::call('down');
                    $type->status = $status;
                    $type->save();

                    $notification = [
                        'status' => 200,
                        'msg' => 'Maintenance mode activated!'
                    ];
                }
                else if(!$status && $type->status){
                    Artisan::call('up');
                    $type->status = $status;
                    $type->save();

                    $notification = [
                        'status' => 200,
                        'msg' => 'Application is activated!'
                    ];
                }
                else{
                    $notification = [
                        'status' => 404,
                        'msg' => 'Something went wrong!'
                    ];
                }

                return new Settings($notification);
            }else{
                $notification = [
                    'status' => 400,
                    'msg' => 'Bad request!'
                ];
                return new Settings($notification);
            }
        }catch(\Throwable $th){
            $notification = [
                'status' => 500,
                'msg' => 'Internal Server Error!'
            ];
            return new Settings($notification);
        }
    }

    /**
     *
     */
    public function adminSettings(){
        return view('admin.settings.admin');
    }

    /**
     *
     */
    public function seoSettings(){
        return view('admin.settings.seo');
    }
}
