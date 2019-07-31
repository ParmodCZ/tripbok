<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use App\Mailer;
class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * send eamil .
    */
    public function send(Request $request){

    	if ($request->isMethod('post')) {
            $data = $request->input('data');
            $send= array();
            $send   = $data['Mail'];
            mail::send([],$send, function($message) use($send){
             	$message->to($send['to']);
                if($send['cc'] !=''){
                    $message->cc($send['cc']);
                }
                if($send['bcc'] !=''){
                    $message->bcc($send['bcc']);              
                }
                if($send['bcc'] !=''){
                    $message->Subject($send['subject']);             
                }            	
                $message->setBody($send['message'], 'text/html');				
			});
            $response = Mailer::create($send);
            if($response){
                $message = "eamil has been successfully sent!";
                $var     = "success";
            }else{
                $message = "There is some problem while sending the email. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/mails/composer');
        }else{
        	return view('pages.mails.composer');
        }
    }

    /**
    * sent eamil view and index.
    */
    public function sent(Request $request){
        return view('pages.mails.sent_index');
    }

    /**
     * get vehicles using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sent_ajax(Request $request){
        $data = Mailer::select('*');
        $data_count = $data->count();
         //echo"<pre>";print_r($request->all());die;
        $draw   = 1;
        $start  = $request->input('start');
        $length = $request->input('length');
        $draw   = $request->input('draw');
        $order  = $request->post("order");
        $search_arr   = $request->post("search");
        $search_value = $search_arr['value'];
        $search_regex = $search_arr['regex'];
        $columns      = $request->post("columns");

        $col = 0;
        $dir = "";
        if(!empty($order)) {
            foreach($order as $o) {
                $col   = $o['column'];
                $dir   = $o['dir'];
                $order = $columns[$col]['name'];
            }
        }
     
        if($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        } 


        // Overall Search 
        if(!empty($search_value)){
            $data = $data->where(function($q) use ($search_value){
                $q->orWhere('to' ,'like', '%'.$search_value.'%')
                    ->orWhere('cc' ,'like', '%'.$search_value.'%')
                    ->orWhere('bcc' ,'like', '%'.$search_value.'%')
                    ->orWhere('subject' ,'like', '%'.$search_value.'%')
                    ->orWhere('message' ,'like', '%'.$search_value.'%');
                    
            });
        }
        // Sorting by column
        if($order != null){

            $data = $data->orderBy($order, $dir);
                      
        }else{
            $data = $data->orderBy('to', 'asc');
        }

        //data limt 
        $data = $data->offset($start)->limit($length)->get();

       $arr= array();
        foreach ($data as $value) {

            $s_arr = array();
            $s_arr['to'] =$value->to;
            $s_arr['cc'] =$value->cc;
            $s_arr['bcc'] =$value->bcc;
            $s_arr['subject'] =$value->subject;
            $s_arr['message'] =$value->message;
            $s_arr['actions'] ='<div><a href="#" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteMail('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
            $arr[] =$s_arr;
        }
    
       $returnData = array(
        'draw' =>$draw,
        'recordsTotal' => $data_count,
        'recordsFiltered' => $data_count,
        'data' =>$arr );
        //return $arrayName ;
        echo json_encode($returnData);
        exit();
    }

    // Delete Mails
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $mail = Mailer::find($id);
                $delete = $mail->delete();
                if($delete){
                    return array('status' => 'success');
                }else{
                    return array('status' => 'error');
                }
            }else{
                return array('status' => 'error');
            }
        }
    } 

}
