<?php

namespace App\Http\Controllers\Film;

use App\Filmsettings;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class FilmsettingsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {



            $data = Filmsettings::where('id' ,1)->first();
           return view('film.filmsettings.edit', compact('data'));
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
        $team = Filmsettings::findOrFail(1);
        $team->update($request->all());



        return redirect()->route('admin.film.filmsettings.index');
    }


    /**
     * Display Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = Filmprogram::findOrFail($id);

        return view('film.filmprogram.show', compact('data'));
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
        $data = Filmprogram::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.film.filmprogram.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Filmprogram::whereIn('id', $request->input('ids'))->get();

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
        $offer = Filmprogram::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.film.filmprogram.index');
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
        $offer = Filmprogram::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.film.filmprogram.index');
    }
}
