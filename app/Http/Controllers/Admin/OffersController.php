<?php

namespace App\Http\Controllers\Admin;

use App\Marketingteam;
use App\Offer;
use App\Supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplayMail;
use App\ResponseOffers;
use Illuminate\Support\Facades\Auth;
class OffersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxChangeOffer(Request $request){
      // dd($request->all()) ;

        $auth = Auth::user();
        if($auth->type == 'admin' ){
            $offer = Offer::where('id' , $request->id)->first();
            if($offer){
                if(isset($request->checkactive) && $request->checkactive == 'true'){
                    $offer->status = 1 ;
                }else{
                    $offer->status = 0 ;
                }
                if($offer->marketer_id != ''){
                    $offer->cost_perc = $request->price ;
                }
                if($offer->marketer_id != ''){
                    $offer->cost_perc = $request->price ;
                }
                if($request->supervisor_id > 0){
                  //  dd();
                    $offer->supervisor_id = $request->supervisor_id ;
                }

                $offer->save();

                return response(['status' => true ]);
            }
        }

        return response(['status' => false ]);
    }


    public function index()
    {


       // dd('mm');
        if (! Gate::allows('offer_access')) {
            return abort(401);
        }


        $auth = Auth::user();
        if($auth->type == 'marketer') {
            $marketer = Marketingteam::where('user_id' , $auth->id)->first();
            
            $offers=[];
            if($marketer!=''){
            $offers = Offer::where( 'marketer_id' ,$marketer->id )-> OrderBy('id' , 'desc')->get();
            }
            return view('admin.offersmarketer.index', compact('offers'));
        }else{
            $offers = Offer::OrderBy('id' , 'desc')->get();
            return view('admin.offers.index', compact('offers'));
        }



       // dd($offers);


    }

    /**
     * Show the form for creating new Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('offer_create')) {
            return abort(401);
        }
        return view('admin.offers.create');
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param  \App\Http\Requests\StoreOffersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffersRequest $request)
    {
        if (! Gate::allows('offer_create')) {
            return abort(401);
        }

       //$tags =  explode(",",$request->tags);


        $request = $this->saveFiles($request);


        $offer = Offer::create($request->all());





        return redirect()->route('admin.offers.index');
    }


    /**
     * Show the form for editing Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('offer_edit')) {
            return abort(401);
        }
        $offer = Offer::findOrFail($id);

       // dd('mm');
        return view('admin.offers.edit', compact('offer'));
    }

    public function sendMsg($id){

        if (! Gate::allows('offer_edit')) {
            return abort(401);
        }
        $item=Offer::findOrFail($id);

        return view('admin.offers.sendMsg', compact('item'));   
    }

    public function sendMail(Request $request){
        $email=$request->get('email');
        $msg=$request->get('msg');
        $id=$request->get('id');

    try{
        Mail::to($email)->send(new  ReplayMail('رد على عرض طلب السعر', $msg, $email));
        if ((count(Mail::failures()) > 0)) {
            $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
            return redirect()->back();
        }
    }catch (\Exception $e) {
        $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
         return redirect()->back();
      }
        $ResponseOffers = new ResponseOffers();
        $ResponseOffers->text=$msg;
        $ResponseOffers->offer_id=$id;
        $ResponseOffers->user_id=Auth::user()->id;
        $ResponseOffers->save();

        $request->session()->flash('alert-success', 'تم ارسال ردك بنجاح ');
        return redirect()->back();


    }
    /**
     * Update Offer in storage.
     *
     * @param  \App\Http\Requests\UpdateOffersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffersRequest $request, $id)
    {
        if (! Gate::allows('offer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);

      //  dd($request->all());
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());



        return redirect()->route('admin.offers.index');
    }


    /**
     * Display Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (! Gate::allows('offer_view')) {
            return abort(401);
        }

        $auth = Auth::user();

        //dd($auth->id);
        $marketer = Marketingteam::where('user_id' , $auth->id)->first();
        if($auth->type == 'marketer') {


            $offer = Offer::where( 'id' , $id)->where('marketer_id' ,  $marketer->id)->first();
            if($offer){

                return view('admin.offersmarketer.show', compact('offer'));
            }
        }else{
            $offer = Offer::findOrFail($id);
            $offer->seen = 1 ;
            $offer->save();
            $supervisors = Supervisors::all();

            return view('admin.offers.show', compact('offer' , 'supervisors'));
        }



    }


    /**
     * Remove Offer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('admin.offers.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Offer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Offer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.offers.index');
    }

    /**
     * Permanently delete Offer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.offers.index');
    }
}
