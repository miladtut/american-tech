<?php

namespace App\Http\Controllers\Film;

use App\Filmabout;
use App\Filmpartner;
use App\Filmsettings;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class filmController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */


    public function  home(){
        $partners = Filmpartner::orderBy('id' ,'desc')->get();
        $abouts = Filmabout::orderBy('id' ,'desc')->get();
        $filmsettings = Filmsettings::where('id' , 1 )->first();


       //  dd($filmsettings);
        return view('homefilm' ,compact('partners' , 'abouts' , 'filmsettings'));
    }


    public function index()
    {
        if (! Gate::allows('offer_access')) {
            return abort(401);
        }


            $team = Team::all();


        return view('admin.team.index', compact('team'));
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
        return view('admin.team.create');
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

        $team = Team::create($request->all());




        return redirect()->route('admin.team.index');
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

        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
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

        $team = Team::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.team.index');
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

        $team= Team::findOrFail($id);

        return view('admin.team.show', compact('team'));
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
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.team.index');
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
            $entries = Team::whereIn('id', $request->input('ids'))->get();

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
        $offer = Team::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.team.index');
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
        $offer = Team::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.team.index');
    }
}
