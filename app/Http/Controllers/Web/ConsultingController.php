<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SystemConstants;
use App\Marketingteam;
use App\Consultation;
use Carbon\Carbon;
use \Validator ;
use App\ConsultationAttachments;
use Illuminate\Support\Facades\DB;
use App\User;

class ConsultingController extends Controller
{
    //
    public function index(Request $request){
        $query_string = \Request::query();

        if(count($query_string) > 0 ){
            $marketer = Marketingteam::where('code' , $query_string['m'])->first();
            if($marketer && $marketer->user_id != '' ){
                $user = User::where('id' , $marketer->user_id)->first();
                if($user){
                    $user->view_page_cons = $user->view_page_cons + 1 ;
                    $user->save();
                }
            }
        }

        $now = Carbon::now()->toDateString() ;

        //consultationType
        $consultationType = SystemConstants::query()->where('key', 'consultationType')->first()->getChildren()->get();
       
        //consultationTimes
        $consultationTimes = SystemConstants::query()->where('key', 'ConsultationTimes')->first()->getChildren()->get();

        return  view('front.pages.consult' , compact('now','consultationType','consultationTimes'));
    }



    public function  ajaxaddCounsult(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'phone' => 'required',
            'consultation_type'=>'required',
            'consultation_details'=>'required',
            // 'attachments'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);


        if ($validator->fails())
        return response()->json(['status'=>false , 'data_validator' => $validator->messages() ]);

          //start DB transaction
          DB::beginTransaction();

          try{

        $team = new Consultation() ;
        $team->fullname = $request->name ;
        $team->phone = $request->phone ;
        $team->email = $request->email ;

        $team->details = $request->consultation_details ;
        $team->type = $request->consultation_type ;

        if($request->date != ''){
            $date=explode(" ",$request->date);
            $textDate= $date[1] .' '. $date[2] . ' ' .$date[3];
            $team->date = Carbon::now()->toDateString();
            // dd($textDate);

            $team->date = $textDate ;
        }else{
            $team->date = Carbon::now()->toDateString();
        }

        $team->time = $request->time ;

        if($request->marketer_hash){
            $marketer = Marketingteam::where('code' , $request->marketer_hash)->first();
            if($marketer){
                $team->marketer_id = $marketer->id ;
            }
        }

        $team->Save();

        //save ConsultationAttachments 
        $attachments=$request->attachments;
        if($attachments!=''){
            foreach($attachments as $attachment){
                $item=new ConsultationAttachments();
                $item->consultation_id=$team->id;
                $item->file=$attachment;
                $item->save();
            }
        }

     DB::commit();

        return response()->json(['status' => true, 'data' => 'add' ]);
        
        }catch (\Exception $e) {
            DB::rollback();
        }
        return response()->json(['status' => false, 'data' =>__('global.front.unexpected_error')]);

    }

}
