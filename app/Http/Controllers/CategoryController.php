<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        return view('categories');
    }

    public function categoryCreated ()
    {
        return view('categoryCreated');
    }

    public function addCategories(Request $request)
    {
        $categories = new Category();
        $input = $request->all();

        $categories->name = $input['name'];
        $categories->description = $input['description'];
        $categories->save();
        session()->flash('addCategories');
        return back();
    }
}
