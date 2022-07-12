<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;



use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;






    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Gate;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Admin\StoreOffersRequest;
    use App\Http\Requests\Admin\UpdateOffersRequest;
    use App\Http\Controllers\Traits\FileUploadTrait;

    use Auth;
class NewsController extends Controller
{
    use FileUploadTrait;


    /**
     * Display a listing of News.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('news_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('news_delete')) {
                return abort(401);
            }
            if(Auth::user()->role_id == 1)
            $news = News::onlyTrashed()->orderBy('id' ,'desc')->get();
            else
                $news = News::where('user_id',Auth::user()->id)->orderBy('id' ,'desc')->onlyTrashed()->get();
        } else {

            if(Auth::user()->role_id == 1)
                $news = News::orderBy('id' ,'desc')->get();
            else
                $news = News::where('user_id',Auth::user()->id)->orderBy('id' ,'desc')->get();
        }

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating new News.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('news_create')) {
            return abort(401);
        }


        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $categories = Category::get()->pluck('name', 'id');

        return view('admin.news.create', compact('users' , 'categories'));
    }

    /**
     * Store a newly created News in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        if (! Gate::allows('news_create')) {
            return abort(401);
        }

        $request = $this->saveFiles($request);

        $news = News::create($request->all());


        return redirect()->route('admin.news.index');
    }


    /**
     * Show the form for editing News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('news_edit')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $news = News::findOrFail($id);
        $categories = Category::get()->pluck('name', 'id');
        return view('admin.news.edit', compact('news', 'users' , 'categories'));
    }

    /**
     * Update News in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('news_edit')) {
            return abort(401);
        }


        $request = $this->saveFiles($request);


        $news = News::findOrFail($id);


      //  dd($request->all());
        $news->update($request->all());



        return redirect()->route('admin.news.index');
    }


    /**
     * Display News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('news_view')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        //$newsimages = \App\Newsimage::where('news_id', $id)->get();

        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news', 'newsimages'));
    }


    /**
     * Remove News from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index');
    }

    /**
     * Delete all selected News at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = News::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore News from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        $news = News::onlyTrashed()->findOrFail($id);
        $news->restore();

        return redirect()->route('admin.news.index');
    }

    /**
     * Permanently delete News from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('news_delete')) {
            return abort(401);
        }
        $news = News::onlyTrashed()->findOrFail($id);
        $news->forceDelete();

        return redirect()->route('admin.news.index');
    }
}
