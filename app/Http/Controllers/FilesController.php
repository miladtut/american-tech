<?php
namespace App\Http\Controllers;

use App\ServiceFile;
use Illuminate\Http\Request;
use App\Logic\ImageRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Consultation;
use App\ConsultationAttachments;
use App\Marketingteam;
class FilesController extends Controller
{
    //

    public function getDefaultFileConsultationِAttachments($link){
        if(Auth::check()){ 
           
        $path = storage_path("app/uploads/files/" . $link);

        if (!File::exists($path)) abort(404);

        if(Auth::user() ->type!= 'admin' ){
            $attachment=ConsultationAttachments::where('file',$link)->first();
            if($attachment!=''){
                 $team=Marketingteam::where('user_id',Auth::user()->id)->first();
                 if($team!=''){
                $item=Consultation::where('id',$attachment->consultation_id)->where('marketer_id',$team->id)->first();
                 if($item==''){
                     abort(404);
                 }

                }
            }
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header("Content-Type", $type);

        return $response;
           

        }
        abort(404);

    }

    public function getDefaultCV($link){
         if(Auth::check()){ 
            if(Auth::user() ->type== 'admin' ){
        $path = storage_path("app/uploads/files/" . $link);

        if (!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header("Content-Type", $type);

        return $response;

         }
        }
         abort(404);
    }


}
