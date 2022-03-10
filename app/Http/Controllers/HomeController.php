<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;

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
        return view('home');
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
