<?php

namespace App\Http\Controllers\Admin;

use App\Marketingteam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Mail ;

use Auth ;
class UsersmarketerController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */

    public function testemail(){

        $marketer = Marketingteam::where('id' , 61)->first();
        $password  = '123123' ;

        //dd($marketer );

        Mail::send('auth.emails.welcome', ['data' => $marketer , 'pass' => $password ], function ($m) use ( $marketer) {

            $m->to( 'mohammed91my@gmail.com', 'man')->subject('Welcome To You ');
        });

        return redirect()->route('admin.marketingteam.index');

    }
    public function index()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_access')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.usersmarketer.index', compact('users'));
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

        $arr = \Request::query() ;
        $marketer = Marketingteam::where('id' , $arr['id'])->whereNull('user_id' )->first();

        if($marketer){
            $marketer->seen =1 ;
            $marketer->save();
            $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
            $enum_type = User::$enum_type;



            return view('admin.usersmarketer.create', compact('enum_type', 'roles' , 'marketer'));

        }

        return redirect()->route('admin.marketingteam.index');

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


        //dd($request->all());

        $marketer = Marketingteam::where('id' , $request->marketer_id)->first();
        $user = User::create($request->all());
        $user->role_id = 2 ;
        $user->type= 'marketer' ;
        $user->save();
        $marketer->user_id = $user->id ;
        $marketer->save() ;

        $password = $request->password ;

        $url = url('/').'/'.$marketer->code ;

        try{
              
        Mail::send('auth.emails.welcome', [ 'user' => $user, 'url' =>  $url , 'pass' => $password ], function ($m) use ( $marketer , $user) {
            $m->to( $user->email, $marketer->fullname)->subject('مرحبا بكم في فريقنا');
        });
        }catch (\Exception $e) {
         
          }
       



        return redirect()->route('admin.marketingteam.index');
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

        $marketer = Marketingteam::find($id);
        if($marketer){
            $user = User::findOrFail($marketer->user_id);
            return view('admin.usersmarketer.edit', compact('user', 'enum_type', 'roles'));

        }




        return redirect()->route('admin.marketingteam.index');
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $is_exist = User::where('id' , '<>' , $id)->where('email' , $request->email)->first();
        if($is_exist){
            return Redirect::back()->withErrors(['msg', ' الايميل المدخل موجود مسبقا ']);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());


        $marketer = Marketingteam::where('user_id' , $user->id)->first();
        $password = $request->password ;

        $url = url('/').'/'.$marketer->code ;

        try{
        if($request->password != '' )
            Mail::send('auth.emails.welcome', [ 'user' => $user, 'url' =>  $url , 'pass' => $password ], function ($m) use ( $marketer , $user) {
                $m->to( $user->email, $user->name)->subject('مرحبا بكم في فريقنا');
            });
        }catch (\Exception $e) {
         
        }


        return redirect()->route('admin.marketingteam.index');
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
        $colleges = \App\College::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$user_actions = \App\UserAction::where('user_id', $id)->get();$news = \App\News::where('user_id', $id)->get();$books = \App\Book::where('user_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'user_actions', 'news', 'books'));
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
