<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MailingList;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use App\Mail\ReplayMail;
use App\ResponseMailingList;
use Illuminate\Support\Facades\Auth;
class MailingListController extends Controller
{
    //
    public function index(){

        if (! Gate::allows('mailingList_access')) {
            return abort(401);
        }
        $mailingList=MailingList::orderBy('id','desc')->get();

        return view('admin.mailingList.index', compact('mailingList'));
    }

    public function sendMsg($id){

        if (! Gate::allows('mailingList_access')) {
            return abort(401);
        }
        $item=MailingList::find($id);

        return view('admin.mailingList.sendMsg', compact('item'));   
    }

    public function sendMail(Request $request){
        $email=$request->get('email');
        $msg=$request->get('msg');
        $id=$request->get('id');

    try{
        Mail::to($email)->send(new  ReplayMail('رد على اشتراكك بالقائمة البريدية', $msg, $email));
        if ((count(Mail::failures()) > 0)) {
            $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
            return redirect()->back();

        }
    }catch (\Exception $e) {
        $request->session()->flash('alert-danger', 'حدث خطأ اثناء ارسال الرسالة');
         return redirect()->back();
      }
        $ResponseMailingList = new ResponseMailingList();
        $ResponseMailingList->text=$msg;
        $ResponseMailingList->mailList_id=$id;
        $ResponseMailingList->user_id=Auth::user()->id;
        $ResponseMailingList->save();
        $request->session()->flash('alert-success', 'تم ارسال ردك بنجاح ');
        return redirect()->back();
    }

    public  function export()
    {
       
        if (! Gate::allows('mailingList_access')) {
            return abort(401);
        }
        $mailingList=MailingList::orderBy('id','desc')->get();

       $i=1;
       $table=  chr(239) . chr(187) . chr(191);
       $table.='<table border="1">
       <thead>
       <tr style="text-align: center;font-size:16px;"><th colspan="3" style="background-color:#eee;">قائمة الاشتراكات البريدية</th></tr>
       <tr style="font-size:16px;text-align: center;" >
           <th >#</th>
           <th >البريد الالكتروني</th>
           <th >تاريخ الطلب</th>
           </tr>
       </thead>
       <tbody>';

       if(count($mailingList)>0){
       foreach($mailingList as $m){

          $row ="<tr style='font-size:16px;text-align: center;'>".
               "<td >". $i."</td>".
               "<td >". $m->email."</td>".
               "<td >". $m->created_at."</td>";
                $row .= "</tr>";
               ++$i;
               $table.=$row;
       }
    }else{
        $table.= '<tr style="text-align: center;font-size:16px;"><th colspan="3" style="background-color:#eee;">لا يوجد بيانات</th></tr>';

      }

      $table=$table .'</tbody></table>';

       return response($table)->withHeaders(["Content-Type"=>'application/vnd.ms-excel', "Content-Disposition"=> 'attachment; filename="mailList_'.date('d_m_Y').'.xls"']);

    }

}
