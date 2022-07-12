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
use Auth;
class OffersmarketerController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        if (! Gate::allows('offer_view')) {
            return abort(401);
        }

        $auth = Auth::user();
        $marketer = Marketingteam::where('user_id' , $auth->id)->first();
        if($auth->type == 'marketer') {
            $offer = Offer::where( 'id' , $id)->where('marketer_id' ,  $marketer->id)->first();
            if($offer){

                return view('admin.offersmarketer.show', compact('offer'));
            }
        }else{
            $offer = Offer::findOrFail($id);


            return view('admin.offersmarketer.show', compact('offer' ));
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
