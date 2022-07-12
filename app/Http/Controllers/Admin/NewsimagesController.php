<?php

namespace App\Http\Controllers\Admin;

use App\Newsimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsimagesRequest;
use App\Http\Requests\Admin\UpdateNewsimagesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class NewsimagesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Newsimage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('newsimage_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('newsimage_delete')) {
                return abort(401);
            }
            $newsimages = Newsimage::onlyTrashed()->get();
        } else {
            $newsimages = Newsimage::all();
        }

        return view('admin.newsimages.index', compact('newsimages'));
    }

    /**
     * Show the form for creating new Newsimage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('newsimage_create')) {
            return abort(401);
        }
        
        $news = \App\News::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.newsimages.create', compact('news'));
    }

    /**
     * Store a newly created Newsimage in storage.
     *
     * @param  \App\Http\Requests\StoreNewsimagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsimagesRequest $request)
    {
        if (! Gate::allows('newsimage_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $newsimage = Newsimage::create($request->all());



        return redirect()->route('admin.newsimages.index');
    }


    /**
     * Show the form for editing Newsimage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('newsimage_edit')) {
            return abort(401);
        }
        
        $news = \App\News::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $newsimage = Newsimage::findOrFail($id);

        return view('admin.newsimages.edit', compact('newsimage', 'news'));
    }

    /**
     * Update Newsimage in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsimagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsimagesRequest $request, $id)
    {
        if (! Gate::allows('newsimage_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $newsimage = Newsimage::findOrFail($id);
        $newsimage->update($request->all());



        return redirect()->route('admin.newsimages.index');
    }


    /**
     * Display Newsimage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('newsimage_view')) {
            return abort(401);
        }
        $newsimage = Newsimage::findOrFail($id);

        return view('admin.newsimages.show', compact('newsimage'));
    }


    /**
     * Remove Newsimage from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('newsimage_delete')) {
            return abort(401);
        }
        $newsimage = Newsimage::findOrFail($id);
        $newsimage->delete();

        return redirect()->route('admin.newsimages.index');
    }

    /**
     * Delete all selected Newsimage at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('newsimage_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Newsimage::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Newsimage from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('newsimage_delete')) {
            return abort(401);
        }
        $newsimage = Newsimage::onlyTrashed()->findOrFail($id);
        $newsimage->restore();

        return redirect()->route('admin.newsimages.index');
    }

    /**
     * Permanently delete Newsimage from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('newsimage_delete')) {
            return abort(401);
        }
        $newsimage = Newsimage::onlyTrashed()->findOrFail($id);
        $newsimage->forceDelete();

        return redirect()->route('admin.newsimages.index');
    }
}
