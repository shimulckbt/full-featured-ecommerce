<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\View;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::first();
        // dd($adminData);
        return View('admin.admin_profile', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::first();
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileUpdate(Request $request)
    {
        $data = Admin::first();
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $data['profile_photo_path']));

            $filename = date('YmdHi') . $file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully..!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
