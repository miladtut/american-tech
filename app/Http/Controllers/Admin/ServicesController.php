<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Serviceimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServicesRequest;
use App\Http\Requests\Admin\UpdateServicesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;

class ServicesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Service.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {

    }

    public function index()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('service_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('service_delete')) {
                return abort(401);
            }
            $services = Service::onlyTrashed()->get();
        } else {
            $services = Service::all();
        }

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating new Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('service_create')) {
            return abort(401);
        }
        return view('admin.services.create');
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param  \App\Http\Requests\StoreServicesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

         
       if($request->hasFile('file_main'))
       {
        $request['file']=$request['file_main'];
        $request['image']=uploadImage($request);

       }

       if($request->hasFile('file_thumbnail'))
       {
        $request['file']=$request['file_thumbnail'];
        $request['image_thumbnail']=uploadImage($request,70,70);
       }
    
        $service = Service::create($request->all());

        return redirect()->route('admin.services.index');
    }


    /**
     * Show the form for editing Service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');
        $service = Service::findOrFail($id);


        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update Service in storage.
     *
     * @param  \App\Http\Requests\UpdateServicesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicesRequest $request, $id)
    {


       // dd($request->alt[1]);
        if (! Gate::allows('service_edit')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $service = Service::findOrFail($id);

           
       if($request->hasFile('file_main'))
       {
        $request['file']=$request['file_main'];
        $request['image']=uploadImage($request);

       }

       if($request->hasFile('file_thumbnail'))
       {
        $request['file']=$request['file_thumbnail'];
        $request['image_thumbnail']=uploadImage($request,70,70);
       }

       // dd( $request->all() );
        $service->update($request->all());
        
        return redirect()->route('admin.services.index');
    }


    /**
     * Display Service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('service_view')) {
            return abort(401);
        }
        $service = Service::findOrFail($id);

        return view('admin.services.show', compact('service'));
    }


    /**
     * Remove Service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('service_delete')) {
            return abort(401);
        }


        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index');
    }

    /**
     * Delete all selected Service at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('service_delete')) {
            return abort(401);
        }

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if ($request->input('ids')) {
            $entries = Service::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('service_delete')) {
            return abort(401);
        }
        $service = Service::onlyTrashed()->findOrFail($id);
        $service->restore();

        return redirect()->route('admin.services.index');
    }

    /**
     * Permanently delete Service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('service_delete')) {
            return abort(401);
        }
        $service = Service::onlyTrashed()->findOrFail($id);
        $service->forceDelete();

        return redirect()->route('admin.services.index');
    }
}
