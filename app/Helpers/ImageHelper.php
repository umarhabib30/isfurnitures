<?php

namespace App\Helpers;

use App\Helpers\ImageHelper as HelpersImageHelper;
use Intervention\Image\Laravel\Facades\Image;


class ImageHelper
{
    public static function saveImage($imagefile, $path)
    {
        $originalImage = $imagefile;

        // Read the image using Image::read
        $myImage = Image::read($originalImage);
        $originalPath = public_path() . '/' . $path . '/';

        // Get the original file name without extension
        $originalName = pathinfo($originalImage->getClientOriginalName(), PATHINFO_FILENAME);

        // Generate a new filename with time prefix and original name
        $filename = time() . '_' . $originalName . '.' . $originalImage->getClientOriginalExtension();

        // Save the image to the desired path
        $myImage->save($originalPath . $filename);

        // Return the relative path of the saved image
        return $path . '/' . $filename;
    }



    public function deleteImage($path)
    {
        $image_path = public_path() . $path;
        unlink($image_path);
    }


    // composer require intervention/image

    // in config/app.php add to $providers
    // Intervention\Image\ImageServiceProvider::class
    // add to aliases
    // 'Image' => Intervention\Image\Facades\Image::class

}
