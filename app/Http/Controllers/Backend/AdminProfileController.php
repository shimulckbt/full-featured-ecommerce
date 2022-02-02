<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Auth;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(4);
        // dd($adminData);
        return View('admin.admin_profile', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::find(4);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileUpdate(Request $request)
    {
        $data = Admin::find(4);
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

    public function adminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request)
    {

        $validatedData = $request->validate(
            [
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
            ]
        );

        $hashedPassword = Admin::find(4)->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(4);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
