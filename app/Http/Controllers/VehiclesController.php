<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vehicle;
use App\Driver;
use App\Media;
use Session;
use Redirect;
class VehiclesController extends Controller
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
       return view('pages.vehicles.index'); 
    }

    /**
     * get vehicles using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){
           $data = Vehicle::select('*');
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
                    $q->orWhere('vehicle_number' ,'like', '%'.$search_value.'%')
                        ->orWhere('model' ,'like', '%'.$search_value.'%')
                        ->orWhere('type' ,'like', '%'.$search_value.'%')
                        ->orWhere('seats' ,'like', '%'.$search_value.'%');
                        
                });
            }
            // Sorting by column
            if($order != null){

                $data = $data->orderBy($order, $dir);
                          
            }else{
                $data = $data->orderBy('vehicle_number', 'asc');
            }

            //data limt 
            $data = $data->offset($start)->limit($length)->get();

           $arr= array();
           foreach ($data as $value) {

              $s_arr = array();
                $media =  Media::where('module', '=', 'vehicle')
                 ->where('module_id', '=', $value->id)->first();
                $s_arr['media'] ='<div style="width:100px;"><img style="width:100%;" src="'.url("/")."/".$media['file_path'].'"/> </div>';
              $s_arr['vehicle_number'] =$value->vehicle_number;
              $s_arr['model'] =$value->model;
              $s_arr['type'] =$value->type;
              $s_arr['seats'] =$value->seats;
              $s_arr['actions'] ='<div><a href="'.url('admin/vehicles/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteVehicle('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
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

    /**
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){
        $vehicles_type = array(''=>'CHOOSE MAKE','ACURA' => 'ACURA','ALFA ROMEO' => 'ALFA ROMEO','AMERICAN IRONHORSE' => 'AMERICAN IRONHORSE','APRILIA' => 'APRILIA','AUDI' => 'AUDI','AUTOCAR LLC.' => 'AUTOCAR LLC.');
        $model = array('A3' =>'A3','A4'=>'A4','A6'=>'A6','CL'=>'CL','EL'=>'EL','INTEGRA'=>'INTEGRA' );
         $company = array(1 =>'gg',2=>'sg',3=>'gds',4=>'g',5=>'sgd',6=>'sdg' );
         $alldrivers = Driver::with('users')->get();
         $drivers = array();
         foreach ($alldrivers as $value) {
           $drivers[$value->users->id] =$value->users->name;
         }
         //echo "<pre>";print_r($drivers);die;
        if ($request->isMethod('post')) {
            $data = $request->input('data');
            $string_date = strtotime($data['Vehicle']['insurance_renewal_date']);
            $data['Vehicle']['insurance_renewal_date'] = date("Y-m-d",$string_date);
            // $date=date_create_from_format("m/d/Y",$data['Vehicle']['insurance_renewal_date']);
            // $data['Vehicle']['insurance_renewal_date'] = date_format($date,"Y-m-d");
            $vehicle = Vehicle::create($data['Vehicle']);
            if($request->hasFile("data.Vehicle.image") && $vehicle){
                $files = $request->file("data.Vehicle.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'vehicle'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Vehicle']['image'];
                $file_path .= $file_s->storeAs('public/media/vehicle/'.$vehicle->id, $fileNameToStore);
                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'vehicle','module_id'=>$vehicle->id,'submodule'=>'image' );
                $media = Media::create($mediadata);
            }           
            if($vehicle){
                $message = "New vehicle has been successfully created!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the vehicle. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/vehicles/index');
        }else{
            return view('pages.vehicles.add')->with(compact('vehicles_type','model','company','drivers'));
        }
         
    }


    /**
     * Edit vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
        $vehicles_type = array(''=>'CHOOSE MAKE','ACURA' => 'ACURA','ALFA ROMEO' => 'ALFA ROMEO','AMERICAN IRONHORSE' => 'AMERICAN IRONHORSE','APRILIA' => 'APRILIA','AUDI' => 'AUDI','AUTOCAR LLC.' => 'AUTOCAR LLC.');
        $model = array('A3' =>'A3','A4'=>'A4','A6'=>'A6','CL'=>'CL','EL'=>'EL','INTEGRA'=>'INTEGRA' );
         $company = array(1 =>'gg',2=>'sg',3=>'gds',4=>'g',5=>'sgd',6=>'sdg' );
         $alldrivers = Driver::with('users')->get();
         $drivers = array();
         foreach ($alldrivers as $value) {
           $drivers[$value->id] =$value->users->name;
         }
        $vehicle_detail = Vehicle::where('id', '=', $id )->first();
        $vehicle_detail['image'] = '';        
        $media =  Media::where('module', '=', 'vehicle')->where('module_id', '=', $id)->first();   
        if($media){
            $vehicle_detail['image'] =url("/")."/".$media['file_path'];
        }    
        //echo"<pre>";print_r($vehicle_detail);die;
        if ($request->isMethod('post')) {
            $data = $request->input('data');
            $string_date = strtotime($data['Vehicle']['insurance_renewal_date']);
            $data['Vehicle']['insurance_renewal_date'] = date("Y-m-d",$string_date);          
            $vehicle = Vehicle::find($id);
            $vehicle = $vehicle->update($data['Vehicle']);
            if($vehicle){
              if($request->hasFile("data.Vehicle.image")){
                $files = $request->file("data.Vehicle.image"); 
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore = 'vehicle'.time().'.'.$extension;
                $file_path ='storage/app/';
                $file_s = $request->data['Vehicle']['image'];
                $file_path .= $file_s->storeAs('public/media/vehicle/'.$id, $fileNameToStore);
                $mediadata = array('filename' =>$fileNameToStore ,'file_path'=>$file_path, 'module'=>'vehicle','module_id'=>$id,'submodule'=>'image' );

                $media_exist = Media::where('module','=','vehicle')->where('submodule','=','image')->where('module_id','=',$id)->first();
                if($media_exist){
                    $media_exist->update($mediadata);
                }else{
                   $media = Media::create($mediadata); 
                }
              }
                $message = "vehicle has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
           return Redirect::back();
           // return redirect('admin/vehicles/index');
        }else{
            return view('pages.vehicles.edit')->with(compact('vehicles_type','vehicle_detail','model','company','drivers'));
        }
         
    }  
    // Delete Vehicles
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $vehicle = Vehicle::find($id);
                $delete = $vehicle->delete();
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
