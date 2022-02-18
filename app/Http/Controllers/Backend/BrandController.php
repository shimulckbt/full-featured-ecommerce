<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function showAllbrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.all', compact('brands'));
    }

    public function createBrand()
    {
    }
}
