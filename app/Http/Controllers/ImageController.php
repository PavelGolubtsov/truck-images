<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function images()
    {
        return view('images');
    }

    public function imageCreated()
    {
        $categories = Category::get();
        $selectCategoryId = Category::get()->where('user_id', 1);

        return view('admin.imageCreated', compact('categories', 'selectCategoryId'));
    }

    public function getAllImages()
    {
        $images = Image::get();
        return view('getAllImages', compact('images'));
    }

    public function getImages()
    {
        $user_id = Auth::user()->id;
        $images = Image::get();
        //dd($images);
        return view('getImages', compact('images'));
    }

    public function addImages(ImagesRequest $request)
    {
        $images = new Image();
        $file = $request->file('picture');
        $input = $request->all();

        $fileOriginalName = $file->getClientOriginalName();
        $file->storeAs('public/img/images', $fileOriginalName);

        $fileSize = $file->getSize();

        $images->name = $input['name'];
        $images->description = $input['description'];
        $images->picture = $fileOriginalName;
        $images->size = $fileSize;
        $images->category_id = $input['category_id'];
        $images->save();

        session()->flash('addCategories');
        return back()
            ->with('status', "Файл $fileOriginalName успешно загружен")
            ->with('fileOriginalName', $fileOriginalName)
        ;
    }
}
