<?php

namespace App\Http\Controllers\Admin;

use App\Marketingteam;
use App\Offer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\StoreMarketingteamRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;
class MarketingteamController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_access')) {
                    return abort(401);
        }



        $offers = Marketingteam::orderBy('id' , 'desc' )->get();

       // dd($offers);

        return view('admin.marketingteam.index', compact('offers'));
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
        return view('admin.marketingteam.create');
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param  \App\Http\Requests\StoreOffersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarketingteamRequest $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_create')) {
            return abort(401);
        }

        $is_exist = Marketingteam::where('phone' , $request->phone)->orwhere('email' , $request->email)->first();
        if($is_exist ){
            return redirect()->back()->with('alert-danger',__('global.front.the_user_already_exists_and_its_link_is') . '    ' . url('/').'/'.$is_exist->code);

        }

        if(! $request->fullname or  !$request->phone  or !$request->email){
            return redirect()->back()->with('alert-danger',__('global.front.all_fileds_required'));

        }

        $marketer = new Marketingteam ;
        $marketer->fullname = $request->fullname ;
        $marketer->phone = $request->phone ;
        $marketer->email = $request->email ;

        $marketer->code = $this->generateRandomString(6);
        $marketer->Save();

        $message ='تم بنجاح والكود الخاص المسوق هو :' .url('/').'/'.$marketer->code ;

        return redirect()->back()->with('alert-success',$message);

        // return redirect()->route('admin.offers.index');
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
        $offer = Offer::findOrFail($id);

        return view('admin.offers.edit', compact('offer'));
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

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('offer_view')) {
            return abort(401);
        }
        $offer = Marketingteam::findOrFail($id);
        $offer->seen = 1 ;
        $offer->save();


        return view('admin.marketingteam.show', compact('offer'));
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
        $offer = Marketingteam::findOrFail($id);
        if($offer){
            $user = User::where('id' , $offer->user_id)->first();
            if($user){
                $user->delete();
            }


            $offer->delete();

        }


        return redirect()->route('admin.marketingteam.index');
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

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.marketingteam.index');
    }

    /**
     * Permanently delete Offer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('offer_delete')) {
            return abort(401);
        }
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.marketingteam.index');
    }

    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
