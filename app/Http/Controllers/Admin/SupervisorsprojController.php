<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;


use Auth;
class SupervisorsprojController extends Controller
{


    /**
     * Display a listing of Book.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // dd('super');
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $supervisors = Supervisors::all();
      // dd('m');
        return view('admin.supervisors.index', compact('supervisors'));
    }

    /**
     * Show the form for creating new Book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        return view('admin.supervisors.create', compact('enum_type', 'users'));
    }

    /**
     * Store a newly created Book in storage.
     *
     * @param  \App\Http\Requests\StoreBooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $supervisor = new Supervisors();
        $supervisor->name = $request->name ;
        $supervisor->save();


        return redirect()->route('admin.supervisors.index');
    }


    /**
     * Show the form for editing Book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        //dd('m ' ,$id);
        $category = Supervisors::where('id' , $id)->first() ;
        return view('admin.supervisors.edit', compact('category'));
    }

    /**
     * Update Book in storage.
     *
     * @param  \App\Http\Requests\UpdateBooksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        $supervisor = Supervisors::findOrFail($id);
        $supervisor ->update($request->all());



        return redirect()->route('admin.supervisors.index');
    }


    /**
     * Display Book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view('admin.books.show', compact('book'));
    }


    /**
     * Remove Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('book_delete')) {
            return abort(401);
        }


        return redirect()->route('admin.supervisors.index');
    }

    /**
     * Delete all selected Book at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('book_delete')) {
            return abort(401);
        }

    }


    /**
     * Restore Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
       // $book = Book::onlyTrashed()->findOrFail($id);
       // $book->restore();

        return redirect()->route('admin.supervisors.index');
    }

    /**
     * Permanently delete Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
       //r $book = Book::onlyTrashed()->findOrFail($id);
        $super = Supervisors::where('id' , $id)->delete();

        return redirect()->route('admin.supervisors.index');
    }
}
