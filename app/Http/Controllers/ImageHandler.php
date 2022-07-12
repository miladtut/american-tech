<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;


class ImageHandler  {
    public function getPublicImage($size, $id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/default_image.png');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $dataSize = getimagesize($path);
        $getWidth=$dataSize[0];
        $getHeight=$dataSize[1];
       if(strpos($size, 'x')){

        $sizes = explode("x", $size);

        if(is_numeric($sizes[0]) && is_numeric($sizes[1])){

            $manager = new ImageManager();
            $image = $manager->make( $file )->fit($sizes[0], $sizes[1], function ($constraint) {
                $constraint->upsize();
            });

            $response = Response::make($image->encode($image->mime), 200);

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
//            $response->header("Content-Encoding", 'gzip');
            $response->header("Content-Type", $type);
//            $response->header("Vary", 'Accept-Encoding');
//            $img = Image::cache(function($image)use ($id){
//                $src=storage_path('app/uploads/images/'.$id);
//
//                $image->make($src);
//            },10,true);
//             $response->make($img,200,array('Content-Type'=>'image/jpeg'));

            return $response;

        }else {
         abort(404);
         }
        }else{ //the size not contain 'x'

        if(is_numeric($getWidth)){
            $manager = new ImageManager();
            $image = $manager->make( $file )->fit($getWidth,$size ,function ($constraint) {
                $constraint->upsize();
            });
            $response = Response::make($image->encode($image->mime), 200);
            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;

        }else {
            abort(404);
            }
    
            }
    }
    public function getImageResize($size, $id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/default_image.jpg');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        if(is_numeric($size)){

            $manager = new ImageManager();
            $image = $manager->make( $file );
            $height = $image->height();
            $width = $image->width();
            if($width > $height){
                $new_height = (($height * $size)/$width);
                $image = $image->resize($size, $new_height, function ($constraint) {
                    $constraint->upsize();
                });
            }else{
                $new_width = (($width * $size)/$height);
                $image = $image->resize($new_width, $size, function ($constraint) {
                    $constraint->upsize();
                });
            }

            $response = Response::make($image->encode($image->mime), 200);

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;

        }else { abort(404); }
    }
    public function getImageResize_WaterMark($size, $id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/default_image.jpg');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        if(is_numeric($size)){

            $manager = new ImageManager();
            $image = $manager->make( $file );
            $height = $image->height();
            $width = $image->width();
            if($width > $height){
                $new_height = (($height * $size)/$width);
                $image = $image->resize($size, $new_height, function ($constraint) {
                    $constraint->upsize();
                });
                $wmpath = storage_path('app/uploads/watermark.png');
                if($image->width() < 200){
                    $wmsize = $image->width()/2;
                }else{
                    $wmsize = $image->width()/4;
                }

                $watermark = Image::make($wmpath)->resize($wmsize, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->insert($watermark, 'bottom-right', 10, 10);
            }else{
                $new_width = (($width * $size)/$height);
                $image = $image->resize($new_width, $size, function ($constraint) {
                    $constraint->upsize();
                });
                $wmpath = storage_path('app/uploads/watermark.png');
                if($image->width() < 200){
                    $wmsize = $image->width()/2;
                }else{
                    $wmsize =$image->width()/4;
                }

                $watermark = Image::make($wmpath)->resize($wmsize, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->insert($watermark, 'bottom-right', 10, 10);
            }

            $response = Response::make($image->encode($image->mime), 200);

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;

        }else { abort(404); }
    }

    public function getDefaultImage($id){
        $path = storage_path('app/uploads/images/'.$id);
        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $manager = new ImageManager();
        $image = $manager->make( $file );
        $response = Response::make($image->encode($image->mime), 200);
        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
//            $response->header("Content-Encoding", 'gzip');
        $response->header("Content-Type", $type);
//            $response->header("Vary", 'Accept-Encoding');

        return $response;

    }

    public function getWebsiteImage( $website_id , $path , $size = null){
        $path = storage_path('app/websites/'.$website_id . '/'. $path);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/default_image.png');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);


        if ($size != null){
            $size = explode('x' , $size);
            if(is_numeric($size[0]) && is_numeric($size[1])){
                $width = $size[0];
                $height = $size[1];
                $manager = new \Intervention\Image\ImageManager();
                $image = $manager->make($file)->fit($width, $height, function ($constraint) {
                    $constraint->upsize();
                } ,'top' );

                $response = Response::make($image->encode($image->mime), 200);

                $response->header("CF-Cache-Status", 'HIF');
                $response->header("Cache-Control", 'max-age=604800, public');
                $response->header("Content-Type", $type);

                return $response;
            }else{
                abort(404);
            }
        }else{

            $manager = new ImageManager();
            $image = $manager->make( $file );
            $response = Response::make($image->encode($image->mime), 200);
            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);
            return $response;

        }


    }

}
