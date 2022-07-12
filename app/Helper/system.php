<?php

use App\Image;
use App\Info;
use App\Logic\ImageRepository;
use Illuminate\Support\Facades\Response;
use App\Blog;
function uploadImage($request,$width='',$height='') {
    $photo            = $request['file'];
    $extension        = $photo->getClientOriginalExtension();
    $filename         = 'image_' . time() . mt_rand();
    $repo             = new ImageRepository();
    $allowed_filename = $repo->createUniqueFilename($filename, $extension);
    $uploadSuccess1   = $repo->resizeImage($photo, $allowed_filename,$width,$height);
    $originalName     = str_replace('.' . $extension, '', $photo->getClientOriginalName());
    if (!$uploadSuccess1) {
        return Response::json([
            'error'   => true,
            'message' => 'Server error while uploading',
        ], 500);
    }
    $image               = new Image;
    $image->display_name = $originalName . '.' . $extension;
    $image->file_name    = $allowed_filename;
    $image->mime_type    = $extension;
    $image->save();
    return $allowed_filename;
}


function image_url($img, $size = '') {
    return (!empty($size)) ? url('image/' . $size . '/' . $img) : url('image/' . $img);
}

function getLastTagsPost(){
    $tags='';
    $lastPosts=Blog::where('isPublished',1)->orderBy('id','desc')->take(4)->get();

    foreach($lastPosts as $lastPost){
        if(app()->isLocale('ar')){
            $tags=$tags.' , '.$lastPost->tags_ar;

        }else{
            $tags=$tags.' , '.$lastPost->tags_en;
        }

    }

return $tags;
}

function cv_url($file) {
    return url('files_cv/' . $file);
}

function consultationِAttachments_url($file){
    return url('files_consultationِAttachments/' . $file);
}
