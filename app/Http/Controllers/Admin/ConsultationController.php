<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\Marketingteam;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Mail;
use App\ResponseConsultation;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReplayMail;
use App\SystemConstants;

class ConsultationController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            if (! Gate::allows('offer_access')) {
                return abort(401);
            }

        $auth = Auth::user();
        if($auth->type == 'marketer') {
            $marketer = Marketingteam::where('user_id' , $auth->id)->first();
            
            $consultation=[];
            if($marketer!=''){
            $consultation = Consultation::where( 'marketer_id' ,$marketer->id )-> OrderBy('id' , 'desc')->get();
            }
            
        }else{
            $consultation = Consultation::OrderBy('id' , 'desc')->get();
        }






        return view('admin.consultation.index', compact('consultation'));
    }

    /**
     * Show the form for creating new Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


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

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


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

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_edit')) {
            return abort(401);
        }
        $offer = Consultation::findOrFail($id);

        return view('admin.consultation.edit', compact('offer'));
    }

    public function sendMsg($id){

        if (! Gate::allows('offer_view')) {
            return abort(401);
        }
        $item=Consultation::find($id);

        return view('admin.consultation.sendMsg', compact('item'));   
    }

    public function sendMail(Request $request){
        $email=$request->get('email');
        $msg=$request->get('msg');
        $id=$request->get('id');

    try{
        Mail::to($email)->send(new  ReplayMail('رد على استشارتك ', $msg, $email));
        if ((count(Mail::failures()) > 0)) {
            $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
            return redirect()->back();
        }
    }catch (\Exception $e) {
        $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
         return redirect()->back();
      }
        $ResponseConsultation = new ResponseConsultation();
        $ResponseConsultation->text=$msg;
        $ResponseConsultation->consultation_id=$id;
        $ResponseConsultation->user_id=Auth::user()->id;
        $ResponseConsultation->save();
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

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);

      //  dd($request->all());
        $offer = Consultation::findOrFail($id);
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
        if($auth->type == 'marketer'){
            $marketer = Marketingteam::where('user_id' , $auth->id)->first();

             $offer = Consultation::where('id' , $id)->where('marketer_id' , $marketer->id)->first();
             if(!$offer)
                 return redirect()->route('admin.consultation.index');

        }else{
            $offer = Consultation::findOrFail($id);
        }

        
        //CounselingStatus
        $counselingStatus = SystemConstants::query()->where('key', 'CounselingStatus')->first()->getChildren()->get();
       

        return view('admin.consultation.show', compact('offer','counselingStatus'));
    }


    /**
     * Remove Offer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');



        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }

        //dd($id);
        $offer = Consultation::findOrFail($id);
       // dd( $offer);
        $offer->delete();

        return redirect()->route('admin.consultation.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Consultation::whereIn('id', $request->input('ids'))->get();

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
        $offer = Consultation::onlyTrashed()->findOrFail($id);
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
        $offer = Consultation::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.offers.index');
    }

    public function ajaxChangeStatus(Request $request){
  
          $auth = Auth::user();
          if($auth->type == 'admin' ){
              $consultation = Consultation::where('id' , $request->id)->first();
              if($consultation){
                   $consultation->status = $request->status ;     
                    $consultation->save();
  
                  return response(['status' => true ]);
              }
          }
  
          return response(['status' => false ]);
    
        }
        
}
