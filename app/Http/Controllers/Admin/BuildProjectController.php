<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateBuildProjectRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\BuildProject;
class BuildProjectController extends Controller
{
    //
      //
      use FileUploadTrait;

      public function index()
      {
          if (! Gate::allows('buildProject_access')) {
              return abort(401);
          }
  
          $build_projects = BuildProject::findOrFail(1);
  
          return view('admin.buildProject.edit', compact('build_projects'));
      }
  
    
      public function update(UpdateBuildProjectRequest $request, $id)
      {
          if (! Gate::allows('buildProject_access')) {
              return abort(401);
          }
         
          // dd($request->all());
          $buildProject = BuildProject::findOrFail($id);
  
          if($request->hasFile('file')){
          $request['image']=uploadImage($request,650,450);
          }
          // dd($request['image'])
          $buildProject->update($request->all());
          // $request->session()->flash('alert-success', 'تم بنجاح');
          return redirect()->back();
  
      }
  
}
