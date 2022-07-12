<?php

namespace App\Http\Controllers\Film;

use App\Filmspeaker;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOffersRequest;
use App\Http\Requests\Admin\UpdateOffersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class FilmspeakerController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Offer.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {



            $filmspeaker= Filmspeaker::all();


           return view('film.filmspeaker.index', compact('filmspeaker'));
    }

    /**
     * Show the form for creating new Offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $enum_type =Filmspeaker::$enum_type;
        return view('film.filmspeaker.create', compact('enum_type'));
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
        $data = Filmspeaker::create($request->all());
        //$request = $this->saveFiles($request);
        return redirect()->route('admin.film.filmspeaker.index');
    }


    /**
     * Show the form for editing Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $enum_type =Filmspeaker::$enum_type;
        $data = Filmspeaker::findOrFail($id);
        return view('film.filmspeaker.edit', compact('data' , 'enum_type'));
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
        $team = Filmspeaker::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.film.filmspeaker.index');
    }


    /**
     * Display Offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = Filmspeaker::findOrFail($id);

        return view('film.filmspeaker.show', compact('data'));
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
        $data = Filmspeaker::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.film.filmspeaker.index');
    }

    /**
     * Delete all selected Offer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Filmspeaker::whereIn('id', $request->input('ids'))->get();

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
        $offer = Filmspeaker::onlyTrashed()->findOrFail($id);
        $offer->restore();

        return redirect()->route('admin.film.filmspeaker.index');
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
        $offer = Filmspeaker::onlyTrashed()->findOrFail($id);
        $offer->forceDelete();

        return redirect()->route('admin.film.filmspeaker.index');
    }
}
