<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marketingteam;
use App\SystemConstants;
use App\Offer;
use \Validator ;
use Illuminate\Support\Facades\DB;
use App\User;
class OfferPriceController extends Controller
{
    //

    public  function index(Request $request){

        $query_string = \Request::query();
        if(count($query_string) > 0 ){
            $marketer = Marketingteam::where('code' ,  $query_string['m'])->first();
            if($marketer && $marketer->user_id != '' ){
                $user = User::where('id' , $marketer->user_id)->first();
                if($user){
                    $user->view_page_offer = $user->view_page_offer + 1 ;
                    $user->save();
                }

            }
        }

       //Bidding Options
      $biddingOptions = SystemConstants::query()->where('key', 'BiddingOptions')->first()->getChildren()->get();

      //Project Type
      $projectType = SystemConstants::query()->where('key', 'ProjectType')->first()->getChildren()->get();
      
      //Projected Time
      $projectedTime = SystemConstants::query()->where('key', 'ProjectedTime')->first()->getChildren()->get();
     
      //ProjectStartTime
      $projectStartTime = SystemConstants::query()->where('key', 'ProjectStartTime')->first()->getChildren()->get();
      
      //connect
      $connect = SystemConstants::query()->where('key', 'Connect')->first()->getChildren()->get();
      
        return view('front.pages.offerprice',compact('biddingOptions' , 'projectType','projectedTime','projectStartTime','connect' )) ;
    }

    public function  ajaxaddOffer(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
           'phone' => 'required',
           'email' => 'required',
           'project_desc'=>'required',
           'project_type'=>'required',
           'client_type'=>'required',
           'biddingOptions'=>'required',
           'connect'=>'required',
           'when_start'=>'required',

        ]);


        if ($validator->fails())
        return response()->json(['status'=>false , 'data_validator' => $validator->messages() ]);

        //start DB transaction
        DB::beginTransaction();

        try{
        $team = new Offer() ;
        $team->fullname = $request->name ;
        $team->phone = $request->phone ;
        $team->email = $request->email ;

        $team->project_desc = $request->project_desc ;
        $team->project_type = $request->project_type ;

        $team->price_from = $request->price_from ;
        $team->price_to = $request->price_to ;
        $team->time_progress = $request->time_progress ;
        $team->when_start = $request->when_start ;
        $team->client_type = $request->client_type ;
        $team->biddingOptions=$request->biddingOptions;

        $team->from_where_connect = $request->connect ;

        if($request->marketer_hash){
            $marketer = Marketingteam::where('code' , $request->marketer_hash)->first();
            if($marketer){
                $team->marketer_id = $marketer->id ;
            }
        }
        $team->save();

        DB::commit();

        return response()->json(['status' => true, 'data' =>__('global.front.operation_accomplished_successfully') ]);
        
        }catch (\Exception $e) {
            DB::rollback();
        }
        return response()->json(['status' => false, 'data' =>__('global.front.unexpected_error')]);

    }


}
