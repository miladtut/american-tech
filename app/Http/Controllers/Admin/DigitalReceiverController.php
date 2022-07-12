<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DigitalReceiver;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\UpdateDigitalReceiversRequest;

class DigitalReceiverController extends Controller
{

    public function index()
    {
        if (! Gate::allows('digitalReceiver_access')) {
            return abort(401);
        }

        $digitalReceiver = DigitalReceiver::findOrFail(1);

        return view('admin.digitalReceiver.index', compact('digitalReceiver'));
    }

  
    public function update(UpdateDigitalReceiversRequest $request, $id)
    {
        if (! Gate::allows('digitalReceiver_access')) {
            return abort(401);
        }
        
        if($request->hasFile('file')){
            $request['image']=uploadImage($request,165,140);
        }
        $digitalReceiver = DigitalReceiver::findOrFail($id);
        $digitalReceiver->update($request->all());

        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();

    }

}
