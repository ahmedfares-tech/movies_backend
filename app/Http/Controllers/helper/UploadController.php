<?php

namespace App\Http\Controllers\helper;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public static function upload(Request $request, $direction = 'images')
    {
        $prepare = Image::make($request->poster);
        $hash = md5($prepare->__toString());
        $ext = 'png';
        $path = "public/{$direction}/{$hash}" . Carbon::now()->timestamp . ".{$ext}";
        $prepare = $prepare->stream();
        Storage::disk('local')->put($path, $prepare);


        return ['success' => true, 'url' => Storage::url($path)];
    }
    public static function uploadMovie(Request $request, $direction = 'movies')
    {
        $prepare = $request->video;
        $path = "public/{$direction}/" . Carbon::now()->timestamp;
        $test = Storage::disk('local')->put($path, $prepare);
 
        // $path = $request->file('video')->store('movies', ['disk' => 'local']);
        return ['success' => true, 'url' => str_replace('public', '/storage', $test)];
    }
}
