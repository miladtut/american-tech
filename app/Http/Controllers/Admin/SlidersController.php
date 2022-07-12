<?php

namespace App\Http\Controllers\Admin;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSlidersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class SlidersController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        if (! Gate::allows('slider_access')) {
            return abort(401);
        }
        $slider = Slider::findOrFail(1);

        return view('admin.sliders.edit', compact('slider'));
    }

  
    public function update(UpdateSlidersRequest $request, $id)
    {
        if (! Gate::allows('slider_edit')) {
            return abort(401);
        }
     
        if($request->hasFile('file'))
        {
            $request['image']=uploadImage($request);

        }
        
        $slider = Slider::findOrFail($id);
        $slider->update($request->all());

        // $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();

    }


}
