<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CustomerOpinions;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreCustomerOpinionsRequest;
use App\Http\Requests\Admin\UpdateCustomerOpinionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;

class CustomerOpinionsController extends Controller
{
    //
     //
    //
    use FileUploadTrait;

    
    function __construct() {

    }

    public function index()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('customerOpinions_access')) {
                return abort(401);
            }
            $customerOpinions = CustomerOpinions::onlyTrashed()->get();
        } else {
            $customerOpinions = CustomerOpinions::all();
        }

        return view('admin.customerOpinions.index', compact('customerOpinions'));
    }

  
    public function create()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }
        return view('admin.customerOpinions.create');
    }

    
    public function store(StoreCustomerOpinionsRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

            if($request->hasFile('file'))
            {
                $request['image']=uploadImage($request,60,60);

            }

        $customerOpinions = CustomerOpinions::create($request->all());

         

        return redirect()->route('admin.customerOpinions.index');
    }


    public function edit($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' ){
            return redirect()->route('admin.offers.index');
        }

        $customerOpinions = CustomerOpinions::findOrFail($id);


        return view('admin.customerOpinions.edit', compact('customerOpinions'));
    }

 
    public function update(UpdateCustomerOpinionsRequest $request, $id)
    {

        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $customerOpinions = CustomerOpinions::findOrFail($id);

       if($request->hasFile('file'))
       {
        $request['image']=uploadImage($request,60,60);
       }

        $customerOpinions->update($request->all());

        return redirect()->route('admin.customerOpinions.index');
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

        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }
        $customerOpinions = CustomerOpinions::findOrFail($id);

        return view('admin.CustomerOpinions.show', compact('customerOpinions'));
    }


    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }


        $customerOpinions = CustomerOpinions::findOrFail($id);
        $customerOpinions->delete();

        return redirect()->route('admin.customerOpinions.index');
    }

    public function restore($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }
        $customerOpinions = CustomerOpinions::onlyTrashed()->findOrFail($id);
        $customerOpinions->restore();

        return redirect()->route('admin.customerOpinions.index');
    }

    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('customerOpinions_access')) {
            return abort(401);
        }
        $customerOpinions = CustomerOpinions::onlyTrashed()->findOrFail($id);
        $customerOpinions->forceDelete();

        return redirect()->route('admin.customerOpinions.index');
    }
}
