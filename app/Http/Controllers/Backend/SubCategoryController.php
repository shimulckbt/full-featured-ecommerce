<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

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

        // $num = uniqid(3);
        $num = random_int(0, 100);

        SubCategory::Insert(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)) . '-' . $num,
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn) . '-' . $num,
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
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        // $category_id = $subcategory->category_id;
        // $category = Category::findOrFail($category_id);
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        // $num = uniqid(3);
        $num = random_int(0, 100);
        SubCategory::findOrFail($id)->update(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)) . '-' . $num,
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn) . '-' . $num,
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

    /////////////////////       Sub Sub Category       /////////////////////


    public function allSubSubCategory()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.sub-subcategory.all', compact('subsubcategories', 'subcategories', 'categories'));
    }

    public function getSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function createSubSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_bn' => 'required',
        ]);

        // $num = uniqid(3);
        $num = random_int(0, 100);

        SubSubCategory::Insert(
            [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
                'sub_subcategory_name_bn' => $request->sub_subcategory_name_bn,
                'sub_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->sub_subcategory_name_en)) . '-' . $num,
                'sub_subcategory_slug_bn' => str_replace(' ', '-', $request->sub_subcategory_name_bn) . '-' . $num,
            ]
        );

        $notification = array(
            'message' => 'Sub-Subcategory Added Successfully..!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editSubSubCategory($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        // $category_id = $subcategory->category_id;
        // $category = Category::findOrFail($category_id);
        // dd($subsubcategory);
        return view('admin.sub-subcategory.edit', compact('subsubcategory', 'subcategories', 'categories'));
    }

    public function updateSubSubCategory(Request $request, $id)
    {
        // $num = uniqid(3);
        $num = random_int(0, 100);
        SubSubCategory::findOrFail($id)->update(
            [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
                'sub_subcategory_name_bn' => $request->sub_subcategory_name_bn,
                'sub_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->sub_subcategory_name_en)) . '-' . $num,
                'sub_subcategory_slug_bn' => str_replace(' ', '-', $request->sub_subcategory_name_bn) . '-' . $num,
            ]
        );

        $notification = array(
            'message' => 'Subcategory Updated Successfully..!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function deleteSubSubCategory($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory Deleted Successfully..!',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
}
