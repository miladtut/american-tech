<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingsRequest;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use Auth ;
use App\Http\Controllers\Traits\FileUploadTrait;

class SettingsController extends Controller
{   
     use FileUploadTrait;

    /**
     * Display a listing of Setting.
     *
     * @return \Illuminate\Http\Response
     */

    public function settingsProfile(Request $request){
        $auth = Auth::user();
        if($auth->type == 'marketer'){
            $setting = Setting::first();
            return view('admin.settings.iban' , compact('setting'));
        }
    }

    public function settingsProfileUpdate(Request $request){
        $auth = Auth::user();
        if($auth->type == 'marketer'){
           $auth->bank_iban = $request->bank_iban;

           $auth->save();

          return  redirect('admin/settings/profile') ;
        }
    }


    public function index()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('setting_delete')) {
                return abort(401);
            }
            $settings = Setting::onlyTrashed()->get();
        } else {
            $settings = Setting::all();
        }

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating new Setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_create')) {
            return abort(401);
        }
        return view('admin.settings.create');
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param  \App\Http\Requests\StoreSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingsRequest $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_create')) {
            return abort(401);
        }
        $setting = Setting::create($request->all());



        return redirect()->route('admin.settings.index');
    }


    /**
     * Show the form for editing Setting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_edit')) {
            return abort(401);
        }
        $setting = Setting::findOrFail(1);

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update Setting in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_edit')) {
            return abort(401);
        }

        if($request->hasFile('file'))
        {
                $file=$request->file('file');
                $destinationPath = 'uploads';
                $name =time(). ''. $file->getClientOriginalName();
                $file->move($destinationPath,$name);
                $request['companyFile']=$name;
                
        }

        if($request->hasFile('file_logo'))
        {
            $request['file']=  $request['file_logo'];
            $request['logo']=uploadImage($request);                
        }

        
        // $request = $this->saveFiles($request);
        $setting = Setting::findOrFail(1);
        $setting->update($request->all());
        // dd($request->all());
        return redirect()->route('admin.settings.create');
    }


    /**
     * Display Setting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_view')) {
            return abort(401);
        }
        $setting = Setting::findOrFail($id);

        return view('admin.settings.show', compact('setting'));
    }


    /**
     * Remove Setting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('setting_delete')) {
            return abort(401);
        }
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index');
    }

    /**
     * Delete all selected Setting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Setting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Setting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('setting_delete')) {
            return abort(401);
        }
        $setting = Setting::onlyTrashed()->findOrFail($id);
        $setting->restore();

        return redirect()->route('admin.settings.index');
    }

    /**
     * Permanently delete Setting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('setting_delete')) {
            return abort(401);
        }
        $setting = Setting::onlyTrashed()->findOrFail($id);
        $setting->forceDelete();

        return redirect()->route('admin.settings.index');
    }
}
