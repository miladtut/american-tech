<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SystemConstants;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreSystemConstantsRequest;
use Auth ;

class SystemConstantsController extends Controller
{
    //

    function __construct() {

    }

    public function index($parent)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('systemConstants_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('systemConstants_access')) {
                return abort(401);
            }
            $parent = SystemConstants::where('key', $parent)->first();
            $items  = SystemConstants::query()->where('parent_id', $parent->id)
            ->where('isShow',1)
                ->with('parent')->orderByDesc('created_at')->onlyTrashed()->get();

        } else {
            $parent = SystemConstants::where('key', $parent)->first();
            $items  = SystemConstants::query()->where('parent_id', $parent->id)
            ->where('isShow',1)
                ->with('parent')->orderByDesc('created_at')->get();
        }

        return view('admin.systemConstants.index', compact('items'));
    }

    public function create($parent)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('systemConstants_access')) {
            return abort(401);
        }
        return view('admin.systemConstants.create');
    }

    
    public function store($parent,StoreSystemConstantsRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');
         
            $key=$parent;
        $parent = SystemConstants::where('key', $parent)->first();

        $request['parent_id'] = $parent->id;
        
        $item = SystemConstants::create($request->all());

        return redirect()->route('admin.systemConstants.index',$key);
    }


    public function edit($parent,$id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' ){
            return redirect()->route('admin.offers.index');
        }

        $item = SystemConstants::findOrFail($id);


        return view('admin.systemConstants.edit', compact('item'));
    }

    public function update($parent,StoreSystemConstantsRequest $request, $id)
    {

        if (! Gate::allows('systemConstants_access')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        $item = SystemConstants::findOrFail($id);

        $key=$parent;
        $parent = SystemConstants::where('key', $parent)->first();

        $request['parent_id'] = $parent->id;

        $item->update($request->all());

        return redirect()->route('admin.systemConstants.index',$key);
    }



    public function destroy($parent,$id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('systemConstants_access')) {
            return abort(401);
        }
        $key=$parent;


        $item = SystemConstants::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.systemConstants.index',$key);
    }

  
}
