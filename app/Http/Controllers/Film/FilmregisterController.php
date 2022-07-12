<?php

namespace App\Http\Controllers\Film;

use App\Filmprogram;
use App\Filmregister;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class FilmregisterController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {



            $filmregister = Filmregister::all();


           return view('film.filmregister.index', compact('filmregister'));
    }

    /**
     * Show the form for creating new Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('film.filmprogram.create');
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
        $data = Filmprogram::create($request->all());
        //$request = $this->saveFiles($request);
        return redirect()->route('admin.film.filmprogram.index');
    }


    /**
     * Show the form for editing Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $data = Filmprogram::findOrFail($id);
        return view('film.filmprogram.edit', compact('data'));
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
        $team = Filmprogram::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.film.filmprogram.index');
    }


    /**
     * Display Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = Filmregister::findOrFail($id);

        return view('film.filmregister.show', compact('data'));
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
        $data = Filmregister::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.film.filmregister.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Filmregister::whereIn('id', $request->input('ids'))->get();

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
        $offer = Filmregister::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.film.filmregister.index');
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
        $offer = Filmregister::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.film.filmregister.index');
    }
}
