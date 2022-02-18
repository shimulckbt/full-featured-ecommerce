<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function showAllbrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.all', compact('brands'));
    }

    public function createBrand(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/brand/' . $name_gen;
        Image::make($image)->resize(300, 300)->save($save_url);

        Brand::Insert(
            [
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                'brand_image' => $save_url,
            ]
        );

        $notification = array(
            'message' => 'New Brand Added Successfully..!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function updateBrand(Request $request, $id)
    {
        $old_image = $request->old_image;
        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/brand/' . $name_gen;
            Image::make($image)->resize(300, 300)->save($save_url);

            Brand::findOrFail($id)->update(
                [
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                    'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                    'brand_image' => $save_url,
                ]
            );

            $notification = array(
                'message' => 'Brand Updated Successfully..!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($id)->update(
                [
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                    'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                ]
            );

            $notification = array(
                'message' => 'Brand Updated Successfully..!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        unlink($image);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully..!',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.brand')->with($notification);
    }
}
