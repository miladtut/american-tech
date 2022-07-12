<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Auth;
use App\College;
use App\Marketingteam;
class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_access')) {
            return abort(401);
        }


        // $users = User::where('role_id',1)->orderBy('id','desc')->get();
        $users = User::orderBy('id','desc')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_type = User::$enum_type;
        $marketingteams=Marketingteam::orderBy('id','desc')->whereNull('user_id')->get();
            
        return view('admin.users.create', compact('enum_type', 'roles','marketingteams'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $request['role_id']=1;//admin
        if($request->get('type')=='marketer'){
            $request['role_id']=2;   //marketer
            if($request->get('marketer_id')==''){
                $request->session()->flash('alert-danger', 'يرجى تحديد المسوق التابع للحساب');
                return redirect()->back();

            }         
        }

        $user = User::create($request->all());
        // dd($user['id']);
        // exit();
        if($request->get('type')=='marketer'){
            if($request->get('marketer_id')!=''){
            $marketingteams=Marketingteam::where('id',$request->get('marketer_id'))->first();
            $marketingteams->user_id=$user['id'];
            $marketingteams->update();

            }
        }
       
        return redirect()->route('admin.users.index');

    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_type = User::$enum_type;
            
        $user = User::findOrFail($id);
        $marketingteam=Marketingteam::orderBy('id','desc')->whereNull('user_id');

        $marketingteam_auht=Marketingteam::where('user_id',$id);
        $marketingteams=$marketingteam_auht->union($marketingteam)->get();

        return view('admin.users.edit', compact('user', 'enum_type', 'roles','marketingteams'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        //check type

        if($user->role_id==2){
            $marketingteams=Marketingteam::where('user_id',$id)->first();
            $marketingteams->user_id=null;
            $marketingteams->update();
        }

        $request['role_id']=1;//admin
        if($request->get('type')=='marketer'){
            $request['role_id']=2;   //marketer
            if($request->get('marketer_id')==''){
                $request->session()->flash('alert-danger', 'يرجى تحديد المسوق التابع للحساب');
                return redirect()->back();

            }         
        }
       

        $user->update($request->all());

        if($request->get('type')=='marketer'){
            if($request->get('marketer_id')!=''){
            $marketingteams=Marketingteam::where('id',$request->get('marketer_id'))->first();
            $marketingteams->user_id=$user['id'];
            $marketingteams->update();

            }
        }



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $colleges = College::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$user_actions = \App\UserAction::where('user_id', $id)->get();$news = \App\News::where('user_id', $id)->get();$books = \App\Book::where('user_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        if($user->role_id==2){
            $marketingteams=Marketingteam::where('user_id',$user->id)->first();
            $marketingteams->user_id=null;
            $marketingteams->update();
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
