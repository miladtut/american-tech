<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultation;
use App\Offer;
use App\Marketingteam;
use App\Team;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_consultation=count(Consultation::all());
        $count_offer=count(Offer::all());
        $count_marketingteam=count(Marketingteam::all());
        $count_team=count(Team::all());

        $auth = Auth::user();
        if($auth->type == 'marketer') {
            $marketer = Marketingteam::where('user_id' , $auth->id)->first();
               $offers=[];
            if($marketer!=''){
                $count_consultation=count(Consultation::where( 'marketer_id' ,$marketer->id )->get());
                $count_offer=count(Offer::where( 'marketer_id' ,$marketer->id )->get());
            }
        }

        return view('home', compact('count_consultation','count_offer','count_marketingteam','count_team'));
    }
}
