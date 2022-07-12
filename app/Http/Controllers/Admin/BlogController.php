<?php


namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogImages;
use App\SystemConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest ;
use App\Http\Controllers\Traits\FileUploadTrait;
use Auth ;

class BlogController extends Controller
{
   
    function __construct() {

    }

    public function index()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('blog_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('blog_access')) {
                return abort(401);
            }
            $blog = Blog::onlyTrashed()->get();
        } else {
            $blog = Blog::all();
        }

        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('blog_access')) {
            return abort(401);
        }

         //BlogDepartments 
         $blogDepartments = SystemConstants::query()->where('key', 'BlogDepartments')->first()->getChildren()->get();


        return view('admin.blog.create', compact('blogDepartments'));
    }

    
    public function store(StoreBlogRequest $request)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        $blog = Blog::create($request->all());

           
        if($request->hasFile('filename'))
        {
            $id = 0 ;
            $i=0;
            $alts=$request->get('alt');
            $alts_en=$request->get('alt_en');
            
            foreach($request->file('filename') as $file)
            {

                $request['file']=$file;
                $name =uploadImage($request);
                $blogImages = new BlogImages;
                $blogImages->image = $name ;
                $blogImages->blog_id =  $blog->id ;
                $blogImages->alt =  $alts[$i] ;
                $blogImages->alt_en =  $alts_en[$i] ;
                $blogImages->save();
                $i++;
                $id = $id + 1 ;

            }

            $blog->save();
        }
    

        return redirect()->route('admin.blog.index');
    }

    public function edit($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

         //BlogDepartments 
         $blogDepartments = SystemConstants::query()->where('key', 'BlogDepartments')->first()->getChildren()->get();


        $blog = Blog::findOrFail($id);


        return view('admin.blog.edit', compact('blog','blogDepartments'));
    }

    
    public function update(UpdateBlogRequest $request, $id)
    {


       // dd($request->alt[1]);
        if (! Gate::allows('blog_access')) {
            return abort(401);
        }
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        $blog = Blog::findOrFail($id);

       // dd( $request->all() );
        $blog->update($request->all());


            if($request->hasFile('filename'))
            {
                $id = 0 ;
                   $i=0;
            $alts=$request->get('alt');
            $alts_en=$request->get('alt_en');
                foreach($request->file('filename') as $file)
                {

                    $request['file']=$file;
                    $name =uploadImage($request);
                    $blogImages = new BlogImages;
                    $blogImages->image = $name ;
                    $blogImages->blog_id =  $blog->id ;
                       $blogImages->alt =  $alts[$i] ;
                $blogImages->alt_en =  $alts_en[$i] ;
                  
                    $blogImages->save();
                    $id = $id + 1 ;
                    $i++;

                }

                $blogImages->save();
            }
            
               if($request->altedit){
                foreach ($request->altedit as $key=>$alt) {
                    $image = BlogImages::where('id' , $key)->first();
                    if($image){
                        $image->alt = $alt ;
                        $image->save();
                    }

                }
            }
            
              if($request->altedit_en){
                foreach ($request->altedit_en as $key=>$alt) {
                    $image = BlogImages::where('id' , $key)->first();
                    if($image){
                        $image->alt_en = $alt ;
                        $image->save();
                    }

                }
            }

        return redirect()->route('admin.blog.index');
    }


    public function show($id)
    {

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('blog_access')) {
            return abort(401);
        }
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
    }


   
    public function destroy($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');

        if (! Gate::allows('blog_access')) {
            return abort(401);
        }


        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index');
    }

   
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('blog_access')) {
            return abort(401);
        }

        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if ($request->input('ids')) {
            $entries = Blog::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    public function restore($id)
    {
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('blog_access')) {
            return abort(401);
        }
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore();

        return redirect()->route('admin.blog.index');
    }

    
    public function perma_del($id)
    {

        
        $auth = Auth::user() ;
        if($auth->type != 'admin' )
            return redirect()->route('admin.offers.index');


        if (! Gate::allows('blog_access')) {
            return abort(401);
        }
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->forceDelete();

        return redirect()->route('admin.blog.index');
    }
}
