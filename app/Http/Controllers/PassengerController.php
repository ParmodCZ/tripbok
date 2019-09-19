<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Media;
use Session;
use Redirect;
class PassengerController extends Controller
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
     * Passengers index .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
       return view('pages.passengers.index'); 
    }

    /**
     * get Passengers using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){
            $data = User::select('*')->where('role', '=', 1);
            $data_count = $data->count();
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
                    $q->orWhere('name' ,'like', '%'.$search_value.'%')
                    ->orWhere('email' ,'like', '%'.$search_value.'%')
                    ->orWhere('phone' ,'like', '%'.$search_value.'%')
                    ->orWhere('address' ,'like', '%'.$search_value.'%');             
                });
            }
            // Sorting by column
            if($order != null){
                $data = $data->orderBy($order, $dir);          
            }else{
                $data = $data->orderBy('name', 'asc');
            }
            //data limt 
            $data = $data->offset($start)->limit($length)->get();
           $arr= array();
            foreach ($data as $value) {
            	$s_arr = array();
                $media =  Media::where('module', '=', 'passenger')
                 ->where('module_id', '=', $value->id)->first();
                 if($media){
                    $s_arr['media'] = '<div style="width:100px;"><img style="width:100%;" src="'.url("/")."/".$media['file_path'].'"/> </div>';
                 }else{
                    $s_arr['media'] = '<div style="width:100px;"><img style="width:100%;" src="'.url("/")."/storage/app/public/media/user.jpg".'"/> </div>';
                 }
                $s_arr['name']    =  $value->name;
                $s_arr['email']   =  $value->email;
                $s_arr['phone']   =  $value->phone;
                $s_arr['address'] =  $value->address;
                $s_arr['actions'] ='<div><a href="'.url('admin/passengers/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deletePassenger('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
                $arr[] =$s_arr;
            }
            $returnData = array(
            'draw' => $draw,
            'recordsTotal' => $data_count,
            'recordsFiltered' => $data_count,
            'data' =>$arr );
            echo json_encode($returnData);
            exit();
    }

    /**
     * Add Passenger .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){

    	$gender = array('male'=>'male','female' => 'female','other' => 'other');

        if ($request->isMethod('post')) {

            $data = $request->input('data');
            //role
            $data['Passenger']['role'] =1;
            $passenger = User::create($data['Passenger']);
            if($request->hasFile("data.Passenger.image") && $passenger){
                $files = $request->file("data.Passenger.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'passenger'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Passenger']['image'];
                $file_path .= $file_s->storeAs('public/media/passenger/'.$passenger->id, $fileNameToStore);
                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'Passenger','module_id'=>$passenger->id );
                $media = Media::create($mediadata);
            }
            
            if($passenger){
                $message = "New Passenger has been successfully created!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/passengers/index');
        }else{
            return view('pages.passengers.add')->with(compact('gender'));
        }
         
    }

    /**
     * edit Passenger .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){

        $gender = array('male'=>'male','female' => 'female','other' => 'other');

        $passenger_detail = User::where('id', '=', $id )->where('role','=',1)->first();
        $passenger_detail['image'] = '';        
        $media =  Media::where('module', '=', 'Passenger')->where('module_id', '=', $id)->first();   
        if($media){
            $passenger_detail['image'] =url("/")."/".$media['file_path'];
        }
        if ($request->isMethod('post')) {
            $data = $request->input('data');  
           // echo"<pre>";print_r($data);die;        
            $passenger = User::where('id', '=', $id )->where('role','=',1)->first();
            if($request->hasFile("data.Passenger.image")){
                $files = $request->file("data.Passenger.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'passenger'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Passenger']['image'];
                $file_path .= $file_s->storeAs('public/media/passenger/'.$passenger->id, $fileNameToStore);

                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'passenger','module_id'=>$passenger->id );
                $media_exist = Media::where('module','=','passenger')->where('module_id','=',$passenger->id)->first();
                if($media_exist){
                    $media_exist->update($mediadata);
                }else{
                   $media = Media::create($mediadata); 
                }
            }
            $passenger->update($data['Passenger']);
            if($passenger){
                $message = "Passenger has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
           //return Redirect::back();
           return redirect('admin/passengers/index');
        }else{
            return view('pages.passengers.edit')->with(compact('gender','passenger_detail'));
        }
         
    }    

    // Delete Passenger
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $user = User::find($id);
                $delete = $user->delete();
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
