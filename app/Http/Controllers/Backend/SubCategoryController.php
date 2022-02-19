<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $subcategories = SubCategory::latest()->get();
        return view('admin.subcategory.all', compact('subcategories'));
    }
}
