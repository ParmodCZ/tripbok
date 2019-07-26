<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
class TripController extends Controller
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
     * Vehicles index .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
       return view('pages.trips.index'); 
    }

    /**
     * get vehicles using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){

    		$tripis ='booked';
    		// $tripis   = $request->post("tripis");
            $data = Trip::select('*')->where('status', '=', $tripis)->with('drivers')->with('passengers');
            echo"<pre>";print_r($data->get());die;
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
                $data = $data->orderBy('id', 'asc');
            }

            //data limt 
            $data = $data->offset($start)->limit($length)->get();

           $arr= array();
            foreach ($data as $value) {
            	$s_arr = array();
echo"<pre>";print_r($value->drivers);die;
                $s_arr['trip_id'] =  $value->id;
                $s_arr['driver_name']   =  $value->drivers->name;
                $s_arr['passenger_name']   =  $value->passengers->name;
                $s_arr['form'] =  $value->from;
                $s_arr['to'] =  $value->to;
                $s_arr['actions'] ='<div><a href="'.url('admin/drivers/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
                $arr[] =$s_arr;
            }
            $returnData = array(
            'draw' => 1,
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

        if ($request->isMethod('post')) {

            $data = $request->input('data');
            //role
            $data['Driver']['role'] =2;
            $driver = User::create($data['Driver']);
            if($request->hasFile("data.Driver.image") && $driver){
                $files = $request->file("data.Driver.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'driver'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Driver']['image'];
                $file_path .= $file_s->storeAs('public/media/driver/'.$driver->id, $fileNameToStore);
                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$driver->id );
                $media = Media::create($mediadata);
            }
            
            if($driver){
                $message = "New driver has been successfully created!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/drivers/index');
        }else{
            return view('pages.drivers.add')->with(compact('gender'));
        }
         
    }


    /**
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){

        $gender = array('male'=>'male','female' => 'female','other' => 'other');

        $driver_detail = User::where('id', '=', $id )->where('role','=',2)->first();
        $driver_detail['image'] = '';        
        $media =  Media::where('module', '=', 'driver')->where('module_id', '=', $id)->first();   
        if($media){
            $driver_detail['image'] =url("/")."/".$media['file_path'];
        }    
        //echo"<pre>";print_r($vehicle_detail);die;
        if ($request->isMethod('post')) {
            $data = $request->input('data');          
            $driver = User::where('id', '=', $id )->where('role','=',2)->first();
            if($request->hasFile("data.Driver.image")){
                $files = $request->file("data.Driver.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'driver'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Driver']['image'];
                $file_path .= $file_s->storeAs('public/media/driver/'.$driver->id, $fileNameToStore);

                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'driver','module_id'=>$driver->id );
                $media_exist = Media::where('module','=','driver')->where('module_id','=',$driver->id)->first();
                if($media_exist){
                    $media_exist->update($mediadata);
                }else{
                   $media = Media::create($mediadata); 
                }
            }
            $driver->update($data['Driver']);
            if($driver){
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
            return view('pages.drivers.edit')->with(compact('gender','driver_detail'));
        }
         
    }  
}
