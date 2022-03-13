<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        * Gets the data of an authorized user
        */
        //$user = User::find(Auth::user()->id);

        /*
        * Gets the id of the authorized user
        */
        $user_id = Auth::user()->id;

        /*
        * Gets the image data of the authorized user
        */
        //$images = Image::where('user_id', $user->id)->get();

        /*
        * Поулучает данные авторизованного пользователя из связанной таблицы images
        */
        $images = User::find($user_id)->images;

        return view('home', compact('images'));
    }

    public function imageUpload(ImagesRequest $request)
    {
        $file = $request->file('picture');

        $fileOriginalName = $file->getClientOriginalName();        
        /*
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        // "C:\OpenServer\domains\truck\public"
        $filePublicPath = public_path();
        $filePath = $file->getPath();
        $filePathName = $file->getPathname();
        $fileRealPath = $file->getRealPath();
        */
        $file->storeAs('public/img/images', $fileOriginalName);

        /*
        session()->flash('imageUpload', [
            'fileExtension' => $fileExtension,
            'fileFullName' => $fileFullName,
            'fileSize' => $fileSize,
            
            //'filePath' => $filePath,
            //'filePathName' => $filePathName,
            //'fileRealPath' => $fileRealPath,
            
        ]);
        */
        return back()
            ->with('status', "Файл $fileOriginalName успешно загружен")
            ->with('fileOriginalName', $fileOriginalName)
        ;
    }
}
