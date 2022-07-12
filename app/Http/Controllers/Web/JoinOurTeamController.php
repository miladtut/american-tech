<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marketingteam;
use App\SystemConstants;
use App\Team;
use \Validator ;
use Illuminate\Support\Facades\DB;

class JoinOurTeamController extends Controller
{
    //

    public function index(Request $request){

        //WorkingHours
        $workingHours = SystemConstants::query()->where('key', 'WorkingHours')->first()->getChildren()->get();

      return  view('front.pages.joinourteam', compact('workingHours'));

    }
    /////////////////////////////////end function index//////////////////////////////////////////////
    public function ajaxAddTeamMmber(Request $request){


        $validator = Validator::make($request->all(), [
            'file' => 'max:2000',
        ]);

        if ($validator->fails())
            return response()->json(['status'=>false , 'data'=>__('global.front.valodator_max_size_file')]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'bod'=>'required',
            'place'=>'required',
            'education' => 'required' ,
            'type_job' => 'required',
            'job_desc' => 'required',
            'salary_limit'=>'required',
            'link_work'=>'required',
            'experince'=>'required',
            'cv'=>'required',
        ]);


        if ($validator->fails())
        return response()->json(['status'=>false , 'data_validator' => $validator->messages() ]);

        // dd($request->all()) ;

        $is_exist = Team::where('phone' , $request->phone)->first();
        if($is_exist){
            return response()->json(['status'=>false , 'data'=>__('global.front.the_request_with_the_name_already_exists')]);
        }

        //start DB transaction
        DB::beginTransaction();

        try{

        $team = new Team ;
        $team->name = $request->name ;
        $team->phone = $request->phone ;
        $team->email = $request->email ;
        $team->bod = $request->bod ;
        $team->place = $request->place ;
        $team->education = $request->education ;
        $team->job_desc = $request->job_desc ;
        $team->experince = $request->experince ;
        $team->salary_limit = $request->salary_limit ;

        $team->link_work = $request->link_work ;
        $team->file=$request->cv ;
      
        // $file = $request->file('file');
        // if($file){
        //     $team->file = $this->uploadFile($file);
        // }
        //dd($request->all()) ;
        //if()
        // $type_job =  implode(" - ",$request->type_job);
        $team->type_job = $request->type_job ;
        $team->Save();
        DB::commit();

        return response()->json(['status' => true, 'data' => 'add' ]);
        
        }catch (\Exception $e) {
            DB::rollback();
        }
        return response()->json(['status' => false, 'data' =>__('global.front.unexpected_error')]);


    }
    /////////////////////////////////end function add team//////////////////////////////////////////////


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


        /////////////////////////////////end function generateRandomString//////////////////////////////////////////////

    
    public function ajaxAddMarketer(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
         
        ]);


        if ($validator->fails())
        return response()->json(['status'=>false , 'data_validator' => $validator->messages() ]);

        //start DB transaction
        DB::beginTransaction();

        try{

        $is_exist = Marketingteam::where('phone' , $request->phone)->orwhere('email' , $request->email)->first();
        if($is_exist ){
            return response(['status'=>false , 'data'=>__('global.front.the_user_already_exists_and_its_link_is') . '    ' . url('/').'/'.$is_exist->code ]);
        }

        if(! $request->name or  !$request->phone  or !$request->email){
            return response(['status'=>false , 'data'=>__('global.front.all_fileds_required')]);
        }

        $marketer = new Marketingteam ;
        $marketer->fullname = $request->name ;
        $marketer->phone = $request->phone ;
        $marketer->email = $request->email ;

        $marketer->code = $this->generateRandomString(6);
        $marketer->Save();

        $message = url('/').'/'.$marketer->code ;
        DB::commit();

        return response()->json(['status' => true, 'data' => $message ]);
        
        }catch (\Exception $e) {
            DB::rollback();
        }
        return response()->json(['status' => false, 'data' =>__('global.front.unexpected_error')]);


    }



}
