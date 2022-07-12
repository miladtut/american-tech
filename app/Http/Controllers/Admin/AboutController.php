<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAboutRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class AboutController extends Controller
{
    //
    use FileUploadTrait;

    public function index()
    {
        if (! Gate::allows('about_access')) {
            return abort(401);
        }

        $about = About::findOrFail(1);

        return view('admin.about.edit', compact('about'));
    }

  
    public function update(UpdateAboutRequest $request, $id)
    {
        if (! Gate::allows('about_access')) {
            return abort(401);
        }
       
        // dd($request->all());
        $about = About::findOrFail($id);

        if($request->hasFile('file')){
        $request['image']=uploadImage($request,450,395);
        }
        // dd($request['image'])
        $about->update($request->all());
        // $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();

    }

}
