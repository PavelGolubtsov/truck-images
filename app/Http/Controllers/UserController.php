<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUserAuth()
    {
        /*
        * Gets the data of an authorized user
        */
        $userData = Auth::user();

        return view('user', compact('userData'));
    }

    public function showUsers()
    {
        /*
        * Gets the data of all users
        */
        $users = User::get();

        return view('admin.showUsers', compact('users'));
    }

    public function showUserImages()
    {
        /*
        * Gets the data of an authorized user
        */
        //$user = User::find(Auth::user()->id);

        /*
        * Gets the id of the authorized user
        */
        //$user_id = Auth::user()->id;

        /*
        * Gets the image data of the authorized user
        */
        //$images = Image::where('user_id', $user->id)->get();

        /*
        * Gets the data of an authorized user from the associated table images
        */
        //$images = User::find($user_id)->images;

        /*
        * Gets the data of an authorized user from the associated table images
        */
        $images = Auth::user()->imageCategories;
        $sizeUserImages = $images->pluck('size')->sum();

        return view('userImages', compact('images', 'sizeUserImages'));
    }
    
    public function showUserCategories()
    {
        $categories = Auth::user()->categories;

        return view('userCategories', compact('categories'));
    }
}