<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        return response()->json(["image" => self::saveImage($request, "posts")]);
    }

    static function saveImage(Request $request, String $path)
    {
        $img = $request->file('file');
        $imageName = Str::uuid() . "." . $img->extension();
        $imgToStorage = Image::read($img);
        $imgToStorage->cover(1000, 1000);
        $imgPathToSave = public_path() . "/img/" . $path . "/" . $imageName;
        $imgToStorage->save($imgPathToSave);
        return $imageName;
    }
}
