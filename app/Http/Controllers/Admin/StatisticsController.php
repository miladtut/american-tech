<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Statistics;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreStatisticsRequest;
use App\Http\Requests\Admin\UpdateStatisticsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;


class StatisticsController extends Controller
{
 
    use FileUploadTrait;


    function __construct() {

    }

    public function index()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('statistics_access')) {
                return abort(401);
            }
            $statistics = Statistics::onlyTrashed()->get();
        } else {
            $statistics = Statistics::all();
        }

        return view('admin.statistics.index', compact('statistics'));
    }

  
    public function create()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }
        return view('admin.statistics.create');
    }

    
    public function store(StoreStatisticsRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

            if($request->hasFile('file'))
            {
                $request['image']=uploadImage($request,60,60);

            }

        $statistics = Statistics::create($request->all());

         

        return redirect()->route('admin.statistics.index');
    }


    public function edit($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' ){
            return redirect()->route('admin.offers.index');
        }

        $statistics = Statistics::findOrFail($id);


        return view('admin.statistics.edit', compact('statistics'));
    }

 
    public function update(UpdateStatisticsRequest $request, $id)
    {

        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $statistics = Statistics::findOrFail($id);

       if($request->hasFile('file'))
       {
        $request['image']=uploadImage($request,60,60);
       }

        $statistics->update($request->all());

        return redirect()->route('admin.statistics.index');
    }


  
    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }
        $statistics = Statistics::findOrFail($id);

        return view('admin.statistics.show', compact('statistics'));
    }


    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }


        $statistics = Statistics::findOrFail($id);
        $statistics->delete();

        return redirect()->route('admin.statistics.index');
    }

    public function restore($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }
        $statistics = Statistics::onlyTrashed()->findOrFail($id);
        $statistics->restore();

        return redirect()->route('admin.statistics.index');
    }

    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('statistics_access')) {
            return abort(401);
        }
        $statistics = Statistics::onlyTrashed()->findOrFail($id);
        $statistics->forceDelete();

        return redirect()->route('admin.statistics.index');
    }
}
