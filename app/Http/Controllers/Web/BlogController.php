<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\SystemConstants;
class BlogController extends Controller
{
    //

    public function index(Request $request){

        $department_id=$request->get('category');
        //blog
        $blog=Blog::where('isPublished',1)->orderBy('id','desc');

        //post more reader
        $moreReaderPosts=Blog::where('isPublished',1)->orderBy('numViews','desc');

        //last post
        $lastPosts=Blog::where('isPublished',1)->orderBy('id','desc');

        //filter blog
        if($department_id!=''){
            $blog=$blog->where('department_id',$department_id);
            $moreReaderPosts = $moreReaderPosts->where('department_id',$department_id);
            $lastPosts=$lastPosts->where('department_id',$department_id);

        }

        //blog
        $blogs=$blog->paginate(5);
        $blogObj= new Blog();
        $moreReaderPosts=$moreReaderPosts->take(4)->get();
        $lastPosts=$lastPosts->take(4)->get();

        
        //departments
        $departments = SystemConstants::query()->where('key', 'BlogDepartments')->first()->getChildren()->take(9)->get();

        return  view('front.blog.index' , compact('blogs','blogObj','departments','moreReaderPosts','lastPosts'));

    }

    ///////////////////////////////end function index/////////////////////////

    public function single($id){

        $blog=Blog::where('isPublished',1)->where('id',$id)->first();
        if($blog=='') abort(404);

          //post more reader
          $moreReaderPosts=Blog::where('isPublished',1)->orderBy('numViews','desc');

          //last post
          $lastPosts=Blog::where('isPublished',1)->orderBy('id','desc');

          //postsRelated
          $postsRelated=Blog::where('isPublished',1)->where('department_id',$blog->department_id)
          ->orWhere('tags_ar', 'like', '%' . $blog->tags_ar . '%')
          ->orWhere('tags_en', 'like', '%' . $blog->tags_en . '%')
          ->orWhere('title_ar', 'like', '%' . $blog->title_ar . '%')
          ->orWhere('title_en', 'like', '%' . $blog->title_en . '%')
          ->take(2)->get();

        if($blog==''){
            abort(404);
        }

        $blog->numViews=$blog->numViews +1;
        $blog->update();

        $blogObj= new Blog();
        $moreReaderPosts=$moreReaderPosts->take(4)->get();
        $lastPosts=$lastPosts->take(4)->get();

        //departments
        $departments = SystemConstants::query()->where('key', 'BlogDepartments')->first()->getChildren()->take(9)->get();

        return  view('front.blog.single' , compact('blog','blogObj','departments','moreReaderPosts','lastPosts','postsRelated'));

    }


}
