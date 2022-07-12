<?php

namespace App\Http\Controllers\Web;

use App\Book;
use App\Filmabout;
use App\Filmpartner;
use App\Filmsettings;
use App\Client;
use App\ContentPage;
use App\Course;
use App\Medium;
use App\News;
use App\Offer;
use App\Service;
use App\Software;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Controller;
use Laravel\Dusk\Page;
use App;
use App\Marketingteam ;
use \Validator ;
use App\MailingList;
use App\CustomerOpinions;
use App\Statistics;
use App\Slider;
use App\About;
use App\DigitalReceiver;
use App\OurBusiness;
use App\SystemConstants;
use App\BuildProject;
use App\BusinessServices;

class WebController extends Controller
{

    public function getServ(){
        $service = Service::where('id' , 20 )->first();
        //dd($service->images);
    }

    public function baqa(Request $request){

        return  view('website.baqa');

    }


    public function oneBlog(Request $request , $id){

        $news = News::find($id);
        if(!$news)
           return redirect('/blog');

        $get_category = $news->category_id  ;
        $other_news = News::where('category_id' , $get_category)->where('id' , '<>' , $news->id)->get();
        if(count($other_news) > 3 ){
            $other_news = $other_news ->random(3);
        }

        return  view('website.oneblog' , compact('news' , 'other_news'));

    }



    public function blog(Request $request){

        $categories = App\Category::with('news')->orderBy('id' , 'desc')->get();

        return  view('website.blog' , compact('categories'));

    }


    function uploadFile($file){

        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());

        return $file->getClientOriginalName() ;

    }


    function ajaxDeleteImage(Request $request){


         $image = App\Serviceimage::where('id' , $request->image_id )->first();
         if($image){

             $image ->delete();


             return response(['status' => true  ]);
         }

        return response(['status' => false  ]);
    }

    
    function ajaxDeleteImageBlog(Request $request){


        $image = App\BlogImages::where('id' , $request->image_id )->first();
        if($image){

            $image ->delete();


            return response(['status' => true  ]);
        }

       return response(['status' => false  ]);
   }


    function goPage($page){
        $param = ['m' =>$page ] ;
        return redirect()->route('web.index', $param);
    }

    

   

   

  
    public function saveAjaxForm(Request $request){
        if($request->action == 'send_form')
        {
            $news = new App\Filmregister ;
            $news->job  = $request->job;
            $news->name  = $request->name;
            $news->email  = $request->email;
            $news->mobile  = $request->mobile;
            $news->notes  = $request->note;
            $news->company  = $request->company;
            $news->save();

            return response()->json([
                'status' => true,
            ]);
        }
    }


   

   
    public function festive(){

        $partners = Filmpartner::orderBy('id' ,'desc')->get();
        $abouts = Filmabout::orderBy('id' ,'desc')->get();
        $filmsettings = Filmsettings::where('id' , 1 )->first();
        $programs = App\Filmprogram::orderBy('id' ,'asc')->get();
        $speakers = App\Filmspeaker::limit(4)->get();
        return view('website.festive' ,compact('speakers','programs','partners' , 'abouts' , 'filmsettings')) ;

    }

    public function searchFn($word){
        
       // dd($word);
        $our_work =Offer::where('title' , 'like' , '%'.$word.'%')
        ->orWhere('title_en' , 'like' , '%'.$word.'%')
        ->orWhere('title_tr' , 'like' , '%'.$word.'%')
              ->orderBy('id' , 'asc')->get();


        $news = News::where('title' , 'like' , '%'.$word.'%')
            ->orWhere('title_en' , 'like' , '%'.$word.'%')
            ->orWhere('title_tr' , 'like' , '%'.$word.'%')
            ->orwhere('details' , 'like' , '%'.$word.'%')
            ->orWhere('details_en' , 'like' , '%'.$word.'%')
            ->orWhere('details_tr' , 'like' , '%'.$word.'%')
            ->orderBy('id' , 'asc')->get();

        $services = Service::where('title' , 'like' , '%'.$word.'%')
            ->orWhere('title_en' , 'like' , '%'.$word.'%')
            ->orWhere('title_tr' , 'like' , '%'.$word.'%')
            ->orwhere('desciption' , 'like' , '%'.$word.'%')
            ->orWhere('desciption_en' , 'like' , '%'.$word.'%')
            ->orWhere('desciption_tr' , 'like' , '%'.$word.'%')
            ->orderBy('id' , 'asc')->get();



       // dd( $services);

        $odd   = [] ;
        $even  = [] ;
        $i     = 0 ;


        foreach($our_work  as $work ){
            $i++;
            if( $i % 2 ){
                $odd [] = $work ;
            }else{
                $even [] = $work ;
            }
        }

        return view('website.searchresult' ,compact('even' , 'odd' , 'our_work','services' ,'news')) ;
     
    }

    

    public function indexHome(Request $request){


        $query_string = \Request::query();

        if(count($query_string) > 0 ){
            $marketer = Marketingteam::where('code' , $query_string['m'])->first();
            if($marketer && $marketer->user_id != '' ){
                $user = App\User::where('id' , $marketer->user_id)->first();
                if($user){
                    $user->view_page_cons = $user->view_page_cons + 1 ;
                    $user->save();
                }
            }
        }

       $services = Service::orderBy('id','desc')->where('isShow',1)->get();
        $business = OurBusiness::orderBy('id','desc')->get();
       $servicesObj = new Service();
       $settings = App\Setting::where('id' , 1 )->first();

      
       //CustomerOpinions
       $customerOpinions=CustomerOpinions::orderBy('id','desc')->get();

       //Statistics
       $statistics=Statistics::orderBy('id','desc')->get();

       //Slider
       $slider=Slider::find(1);

       //About
       $about=About::find(1);

       //DigitalReceiver
       $digitalReceiver=DigitalReceiver::find(1);

       //BuildProject
       $buildProject=BuildProject::find(1);

       return view('front.home.index',compact('business','services','servicesObj' , 'settings','customerOpinions','statistics','slider','about','digitalReceiver','buildProject' ));

   }

    public function about(){

        //About Us
        $about_us = ContentPage::where('id',1)->first();

        //Our mission
        $our_mission = ContentPage::where('id',2)->first();
        
        //Our vision
        $our_vision = ContentPage::where('id',3)->first();

        return view('front.pages.about',compact('about_us','our_mission','our_vision'));

    }

    public function services(){

        $services = Service::all();
        return view('website.services' ,compact('services')) ;

    }

    public function detailsPage($type , $id){

         if($type == 'offer'){
             $type = 1 ;
             $title = 'عروض مميزة' ;
             $link = 'offers-special';
             $object = Offer::where('type','1')->where('id' ,$id)->first();


         }else if($type == 'offer-iqar'){
             $type = 2;
             $object = Offer::where('type','2')->where('id' ,$id)->first();
             $title = ' عروض عقارية' ;
             $link = 'offer-iqar';

         }else if ($type == 'tours'){
             $type = 3;
             $title = ' رحلات سياحية' ;
             $link = 'tours';
             $object = Offer::where('type','3')->where('id' ,$id)->first();
         }else{
             /// this is service
             $title = '  خدماتنا' ;
             $object = Service::where('id' , $id) ->first();
             $link = 'services';
             $type=4;
         }

         $services = Service::all();
         $offers =  Offer::where('type','1')->inRandomOrder()->limit(2)->get();

         if(!$object)
             redirect('/');

        return view('website.singlepage' ,compact('offers','services' , 'type' , 'object' ,'link' ,'title')) ;

    }

    public function offersSpecial(){

        $offers = Offer::where('type','1')->paginate(20);
        $title = 'عروض مميزة' ;

        return view('website.offers' ,compact('offers' , 'title')) ;

    }

    public function offersStr(){

        $offers = Offer::where('type','2')->paginate(20);
        $title = ' عروض عقارية' ;
        return view('website.offers' ,compact('offers' , 'title')) ;

    }

    public function tours(){

        $offers = Offer::where('type','3')->paginate(20);
        $title = ' رحلات سياحية' ;
        return view('website.offers' ,compact('offers' , 'title')) ;
    }

    public function contactus(){


        return view('website.contact' ) ;


    }

    public function software(){

        $softwares = Software::all();
        if($softwares){
            return view('website.software' ,compact('softwares')) ;
        }
        return redirect('/' ) ;

    }

    public function events(){

        $events = News::all();
        if($events){
            return view('website.news' ,compact('events')) ;
        }
        return redirect('/' ) ;

    }

    public function courses(){

        $courses= Course::all();
        if($courses){
            return view('website.courses' ,compact('courses')) ;
        }
        return redirect('/' ) ;

    }

    public function Search($value){
        dd($value);
    }

    public function allOurWork(){

        $our_work = Offer::where('type','1')->orderby('id' ,'desc')->paginate(10);

        $odd = [] ;
        $even  = [] ;
        $i = 0 ;


        foreach($our_work  as $work ){
            $i++;
            if( $i % 2 ){
                $odd [] = $work ;
            }else{
                $even [] = $work ;
            }

        }




        return view('website.ourwork' ,compact('even' , 'odd' , 'our_work')) ;

    }

    public function oneWork($id){

        $object = Offer::where('type','1')->where('id' ,$id)->first();
        if($object){
            $next  = Offer::where('type','1')->where('id' ,'>',$id)->first();
            $prev  = Offer::where('type','1')->where('id' ,'<',$id)->first();

            $otherwork = Offer::where('type','1')->inRandomOrder()->limit(3)->get();


            $title = 'عروض مميزة' ;
            $link  = 'offers-special';
            $type  = 1;
            return view('website.singlepagework' ,compact('otherwork','type','object' , 'next' , 'prev' , 'link' , 'title')) ;

        }

        return redirect('/') ;


    }

    public function oneNews($id){

        $object = News::where('id' ,$id)->first();
        if( $object ){
            $next = News::where('id' ,'>',$id)->first();
            $prev = News::where('id' ,'<',$id)->first();

            $othern = News::inRandomOrder()->limit(3)->get();
dd( $othern);
            $title = 'عروض مميزة' ;
            $link = 'offers-special';
            $type = 1;
            return view('website.singlepage' ,compact('othern','type','object' , 'next' , 'prev' , 'link' , 'title')) ;


        }

        return redirect('/') ;

    }

    public function lastNews(){


        $news = News::orderby('id' ,'desc')->paginate(20);
        return view('website.lastnews' ,compact('news','object' , 'next' , 'prev' , 'link' , 'title')) ;

    }

    public function serviceDetails($id){

        //service
        $service = Service::where('id' , $id)->where('isShow',1)->first();
        if($service==''){abort(404);}
        
        //ourBusiness
        $ourBusiness=BusinessServices::orderBy('id','desc')->where('service_id',$service->id)->get();

        //create object of service
        $servicesObj=new Service();
        //DigitalReceiver
       $digitalReceiver=DigitalReceiver::find(1);
        if($service){
        return view('front.pages.service' ,compact('service' , 'ourBusiness','servicesObj','digitalReceiver')) ;
        }

        return redirect('/') ;
    }

    public function newsDetails($id){
        $object = News::where('id' ,$id)->first();
        if( $object ){
            $next = News::where('id' ,'>',$id)->first();
            $prev = News::where('id' ,'<',$id)->first();
            $othern = News::inRandomOrder()->limit(3)->get();
            $title = 'عروض مميزة' ;
            $link = 'offers-special';
            $type = 1;
            return view('website.singlepage' ,compact('othern','type','object' , 'next' , 'prev' , 'link' , 'title')) ;

        }

        return redirect('/') ;
    }

    public function mediaStors(){
        $media = Medium::orderby('id' ,'desc')->paginate(20);

        $odd = [] ;
        $even  = [] ;
        $i = 0 ;

        foreach($media  as $work ){
            $i++;
            if( $i % 2 ){
                $odd [] = $work ;
            }else{
                $even [] = $work ;
            }

        }

        return view('website.alllmedia' ,compact('media' , 'even' , 'odd')) ;

        }

 
        public function mailingListSubscriptions(Request $request){
            $email=$request->get('email');        
            $rules = [
                'email' => 'required|unique:mailing_lists',
    
            ];
    
            $messages = [
                'email.required' => __('global.front.email_required'),
                'email.unique' =>  __('global.front.email_unique'),
    
            ];
    
            $validator = \Validator::make(
                [
                    'email' => $email,
                ],
    
                $rules,
                $messages
            );
    
             //cheack  validator
           if ($validator->fails() ) {
            return response()->json(['status' => false, 'data_validator' => $validator->messages() ]);
             }
    
    
            $MailingListSubscriptions= new MailingList();
            $MailingListSubscriptions->email=$email;
            $MailingListSubscriptions->save();
            return response()->json(['status' => true, 'data' => 'تم بنجاح' ]);


        }

   
        public function filePost(Request $request){

            //array allwods extension
            $extensionArray=['pdf','jpeg','png','jpg'];
          
            if($request->hasFile('file')){

            $file=$request->file('file');

            
            $extension = $file->getClientOriginalExtension();
            
            if(!in_array($file->getClientOriginalExtension(),$extensionArray)){
                return response(['status'=>false , 'data' => __('global.the_file_extension_is_not_supported') ]);
            }
            $size=filesize($file);
            // return $size;
            if($size>2000000){
                return response(['status'=>false , 'data' => __('global.A_file_larger_than_2_MB_cannot_be_uploaded') ]);

            }

              $filename = 'file_'.time().mt_rand().'.'.$extension;
    
                $originalName = str_replace('.'.$extension, '', $file->getClientOriginalName());
                $file->move(storage_path() . '/app/uploads/files', $filename);
    
            return response(['status'=>true , 'data' => $filename ]);

        }

    }



        public function changeLang(Request $request)
        {
            $request['lang'] = $request->lang;
            $lang = $request->lang;
            app()->setLocale($lang);
            $url = LaravelLocalization::getLocalizedURL($lang, url()->previous());
            return Redirect::to($url);
        }

}
