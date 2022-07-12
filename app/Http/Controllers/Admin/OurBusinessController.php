<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OurBusiness;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreOurBusinessRequest;
use App\Http\Requests\Admin\UpdateOurBusinessRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;
use App\Service;
use App\BusinessServices;

class OurBusinessController extends Controller
{
    //
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

        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('ourBusiness_access')) {
                return abort(401);
            }
            $ourBusiness = OurBusiness::onlyTrashed()->get();
        } else {
            $ourBusiness = OurBusiness::all();
        }

        return view('admin.ourBusiness.index', compact('ourBusiness'));
    }

    public function create()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }
        $services=Service::orderBy('id','desc')->select('id','title')->get();

        return view('admin.ourBusiness.create', compact('services'));
    }

    
    public function store(StoreOurBusinessRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

            if($request->hasFile('file'))
            {
                $request['image']=uploadImage($request);

            }

        $ourBusiness = OurBusiness::create($request->all());


        // dd($request->all());
        //save BusinessServices
        $services_id=$request->get('service_id');
        foreach($services_id as $service_id){
            $businessServices = new BusinessServices();
            $businessServices->service_id=$service_id;
            $businessServices->business_id=$ourBusiness->id;
            $businessServices->save();
        }

         
        return redirect()->route('admin.ourBusiness.index');
    }


    public function edit($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' ){
            return redirect()->route('admin.offers.index');
        }

        $ourBusiness = OurBusiness::findOrFail($id);
        $services=Service::orderBy('id','desc')->select('id','title')->get();


        return view('admin.ourBusiness.edit', compact('ourBusiness','services'));
    }

 
    public function update(UpdateOurBusinessRequest $request, $id)
    {

        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $ourBusiness = OurBusiness::findOrFail($id);
//    dd($request->all());

       
       if($request->hasFile('file'))
       {
        $request['image']=uploadImage($request);

       }

        $ourBusiness->update($request->all());

        $services_id=$request->get('service_id');
          //remove is not exist
          businessServices::where('business_id',$id)->whereNotIn('service_id', $services_id)->delete();

         //save BusinessServices
         foreach($services_id as $service_id){
             $item=businessServices::where('business_id',$id)->where('service_id', $service_id)->first();
             if($item==''){
             $businessServices = new BusinessServices();
             $businessServices->service_id=$service_id;
             $businessServices->business_id=$id;
             $businessServices->save();
             }
         }

        return redirect()->route('admin.ourBusiness.index');
    }


    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }
        $ourBusiness = OurBusiness::findOrFail($id);

        return view('admin.ourBusiness.show', compact('ourBusiness'));
    }


    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('service_delete')) {
            return abort(401);
        }


        $ourBusiness = OurBusiness::findOrFail($id);
        $ourBusiness->delete();

        businessServices::where('business_id',$id)->delete();


        return redirect()->route('admin.ourBusiness.index');
    }

    public function restore($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }
        $ourBusiness = OurBusiness::onlyTrashed()->findOrFail($id);
        $ourBusiness->restore();

        return redirect()->route('admin.ourBusiness.index');
    }

    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('ourBusiness_access')) {
            return abort(401);
        }
        $ourBusiness = OurBusiness::onlyTrashed()->findOrFail($id);
        $ourBusiness->forceDelete();

        return redirect()->route('admin.ourBusiness.index');
    }

}
