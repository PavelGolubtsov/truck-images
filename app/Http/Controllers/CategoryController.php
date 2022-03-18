<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categories()
    {
        return view('categories');
    }

    public function showCategories()
    {
        $categories = Category::get();

        return view('admin.showCategories', compact('categories'));
    }

    public function categoryCreated ()
    {
        return view('admin.categoryCreated');
    }

    public function addCategories(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $categories = new Category();
        $file = $request->file('picture');
        $input = $request->all();

        $fileOriginalName = $file->getClientOriginalName();
        $file->storeAs('public/img/categories', $fileOriginalName);

        $categories->name = $input['name'];
        $categories->description = $input['description'];
        $categories->picture = $fileOriginalName;
        $categories->user_id = $user->id;
        $categories->save();
        session()->flash('addCategories');
        return back();
    }
}
