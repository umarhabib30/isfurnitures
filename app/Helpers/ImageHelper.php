<?php

namespace App\Helpers;

use App\Helpers\ImageHelper as HelpersImageHelper;
use Intervention\Image\Laravel\Facades\Image;


class ImageHelper
{
    public static function saveImage($imagefile,$path){
        $originalImage=$imagefile;

        $myImage = Image::read($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().'/'.$path.'/';
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);

        return $path.'/'.$filename;
    }

    
    public function deleteImage($path){
        $image_path = public_path().$path;
        unlink($image_path);
    }


    // composer require intervention/image

    // in config/app.php add to $providers
    // Intervention\Image\ImageServiceProvider::class
    // add to aliases
    // 'Image' => Intervention\Image\Facades\Image::class

}
