<?php

namespace App\Http\Controllers\Film;

use App\Filmpartner;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class FilmpartnerController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {



            $filmpartner = Filmpartner::all();


           return view('film.filmpartner.index', compact('filmpartner'));
    }

    /**
     * Show the form for creating new Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('film.filmpartner.create');
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param  \App\Http\Requests\StoreOffersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request = $this->saveFiles($request);
        $data = Filmpartner::create($request->all());
        //$request = $this->saveFiles($request);
        return redirect()->route('admin.film.filmpartner.index');
    }


    /**
     * Show the form for editing Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $data = Filmpartner::findOrFail($id);
        return view('film.filmpartner.edit', compact('data'));
    }

    /**
     * Update Offer in storage.
     *
     * @param  \App\Http\Requests\UpdateOffersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request = $this->saveFiles($request);
        $team = Filmpartner::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.film.filmpartner.index');
    }


    /**
     * Display Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = Filmpartner::findOrFail($id);

        return view('film.filmpartner.show', compact('data'));
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
        $data = Filmpartner::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.film.filmpartner.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Filmpartner::whereIn('id', $request->input('ids'))->get();

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
        $offer = Filmpartner::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.film.filmpartner.index');
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
        $offer = Filmpartner::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.film.filmpartner.index');
    }
}
