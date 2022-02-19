<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.subcategory.all', compact('subcategories', 'categories'));
    }

    public function createSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ]);

        SubCategory::Insert(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
            ]
        );

        $notification = array(
            'message' => 'Subcategory Added Successfully..!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editSubCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // $category = Category::findOrFail($id);
        // $category_id = $category->id;
        // $categoriesa = Category::orderBy('category_name_en', 'ASC')->get();
        // if (($key = array_search($id, $categories)) !== false) {
        //     unset($categories[$key]);
        // }

        // $categories = array_diff_key(
        //     $categoriesa,
        //     array_flip((array) [$category_id])
        // );
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory', 'categories', 'category'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        SubCategory::findOrFail($id)->update(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
            ]
        );

        $notification = array(
            'message' => 'Subcategory Updated Successfully..!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function deleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory Deleted Successfully..!',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
}
