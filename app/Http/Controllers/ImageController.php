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

        return view('imageCreated', compact('categories'));
    }

    public function getAllImages()
    {
        $images = Image::get();
        return view('getAllImages', compact('images'));
    }

    public function getImages()
    {
        $user_id = Auth::user()->id;
        $images = Image::where('user_id', $user_id)->get();
        return view('getImages', compact('images'));
    }

    public function addImages(ImagesRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $images = new Image();
        $file = $request->file('picture');
        $input = $request->all();

        $fileOriginalName = $file->getClientOriginalName();
        $file->storeAs('public/img/images', $fileOriginalName);
        $images->picture = $fileOriginalName;

        $images->name = $input['name'];
        $images->description = $input['description'];
        $images->picture = $fileOriginalName;
        $images->user_id = $user->id;
        $images->category_id = $input['category_id'];
        $images->save();

        session()->flash('addCategories');
        return back()
            ->with('status', "Файл $fileOriginalName успешно загружен")
            ->with('fileOriginalName', $fileOriginalName)
        ;
    }
}
