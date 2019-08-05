<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Media;
use App\Driver;
use Session;
use Redirect;
class DriverController extends Controller
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
     * drivers index .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
       return view('pages.drivers.index'); 
    }

    /**
     * get drivers using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){
            $data = User::select('*')->where('role', '=', 2);
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
                $media =  Media::where('module', '=', 'driver')
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
                $s_arr['actions'] ='<div><a href="'.url('admin/drivers/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteDriver('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
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
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){
    	$gender = array('male'=>'male','female' => 'female','other' => 'other');
         $company = array(1 =>'gg',2=>'sg',3=>'gds',4=>'g',5=>'sgd',6=>'sdg' );
        if ($request->isMethod('post')) {
            $data = $request->input('data');
            //role
            $data['User']['role'] =2;
            $user = User::create($data['User']);
            $data['Driver']['user_id'] =$user->id;            
            $driver = Driver::create($data['Driver']);
            if($driver){
                if($request->hasFile("data.Driver.image")){
                    $files = $request->file("data.Driver.image"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['image'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$driver->id, $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$driver->id ,'submodule'=>'profile');
                    $media = Media::create($mediadata);
                }
                if($request->hasFile("data.Driver.license")){
                    $files = $request->file("data.Driver.license"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['license'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$driver->id, $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$driver->id ,'submodule'=>'license');
                    $media = Media::create($mediadata);
                }
                if($request->hasFile("data.Driver.insurance")){
                    $files = $request->file("data.Driver.insurance"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['insurance'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$driver->id, $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$driver->id ,'submodule'=>'insurance');
                    $media = Media::create($mediadata);
                }
                    $message = "New driver has been successfully created!";
                    $var     = "success";
            
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/drivers/index');
        }else{
            return view('pages.drivers.add')->with(compact('gender','company'));
        }
         
    }

    private function getDetail($id){
        $user = new User();
        if(!empty($id)){
            $user = $user->leftJoin('drivers', 'drivers.user_id', '=', 'users.id')
                    ->where('users.id', '=', $id)->where('users.role', '=', 2);
                    //->leftJoin('media', 'media.module_id', '=', 'drivers.id');
        }
        //echo"<pre>";print_r($user->first());die;
        return $user->first();
    }
    /**
     * edit driver .
     * $id  is user id
     * $request is array of data 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
        $driver_detail = $this->getDetail($id); 
        $gender = array('male'=>'male','female' => 'female','other' => 'other');
        $company = array(1 =>'gg',2=>'sg',3=>'gds',4=>'g',5=>'sgd',6=>'sdg' );
        if ($request->isMethod('post')) {
            $data = $request->input('data');   
               
            $user = User::where('id', '=', $id )->where('role','=',2)->first();
            $user = $user->update($data['User']);
            $driver = Driver::where('id', '=',$data['Driver']['id'] )->where('user_id','=',$id)->first();
            $driver = $driver->update($data['Driver']);
            //echo"<pre>";print_r($driver);die;
            if ($driver) {
                if($request->hasFile("data.Driver.image")){
                    $files = $request->file("data.Driver.image"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['image'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$data['Driver']['id'], $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$data['Driver']['id'],'submodule'=>'profile' );
                    $media_exist = Media::where('module','=','driver')->where('submodule','=','profile')->where('module_id','=',$data['Driver']['id'])->first();
                    if($media_exist){
                        $media_exist->update($mediadata);
                    }else{
                       $media = Media::create($mediadata); 
                    }
                }    
                if($request->hasFile("data.Driver.license")){
                    $files = $request->file("data.Driver.license"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['license'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$data['Driver']['id'], $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$data['Driver']['id'],'submodule'=>'license' );
                    $media_exist = Media::where('module','=','driver')->where('submodule','=','license')->where('module_id','=',$data['Driver']['id'])->first();
                    if($media_exist){
                        $media_exist->update($mediadata);
                    }else{
                       $media = Media::create($mediadata); 
                    }
                } 
                if($request->hasFile("data.Driver.insurance")){
                    $files = $request->file("data.Driver.insurance"); 
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $fileNameToStore = 'driver'.time().'.'.$extension;
                    $file_path ='storage/app/';
                    $file_s = $request->data['Driver']['insurance'];
                    $file_path .= $file_s->storeAs('public/media/driver/'.$data['Driver']['id'], $fileNameToStore);
                    $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$data['Driver']['id'],'submodule'=>'insurance' );
                    $media_exist = Media::where('module','=','driver')->where('submodule','=','insurance')->where('module_id','=',$data['Driver']['id'])->first();
                    if($media_exist){
                        $media_exist->update($mediadata);
                    }else{
                       $media = Media::create($mediadata); 
                    }
                }            
                $message = "driver has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
           return Redirect::back();
           // return redirect('admin/vehicles/index');
        }else{
            return view('pages.drivers.edit')->with(compact('gender','driver_detail','company'));
        }
         
    }    

    // Delete Drivers
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
