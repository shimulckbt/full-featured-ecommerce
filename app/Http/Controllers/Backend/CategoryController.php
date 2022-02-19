<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category.all', compact('categories'));
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ]);

        $icon = $request->file('category_icon');
        $name_gen = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
        $save_url = 'upload/category/' . $name_gen;
        Image::make($icon)->resize(300, 300)->save($save_url);

        Category::Insert(
            [
                'category_name_en' => $request->category_name_en,
                'category_name_bn' => $request->category_name_bn,
                'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
                'category_icon' => $save_url,
            ]
        );

        $notification = array(
            'message' => 'New Category Added Successfully..!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $old_icon = $request->old_icon;
        if ($request->file('category_icon')) {
            unlink($old_icon);
            $icon = $request->file('category_icon');
            $name_gen = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
            $save_url = 'upload/category/' . $name_gen;
            Image::make($icon)->resize(300, 300)->save($save_url);

            Category::findOrFail($id)->update(
                [
                    'category_name_en' => $request->category_name_en,
                    'category_name_bn' => $request->category_name_bn,
                    'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                    'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
                    'category_icon' => $save_url,
                ]
            );

            $notification = array(
                'message' => 'Category Updated Successfully..!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            Category::findOrFail($id)->update(
                [
                    'category_name_en' => $request->category_name_en,
                    'category_name_bn' => $request->category_name_bn,
                    'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                    'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
                ]
            );

            $notification = array(
                'message' => 'Category Updated Successfully..!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $icon = $category->category_icon;
        unlink($icon);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully..!',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.category')->with($notification);
    }
}
