<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vehicle;
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
              $s_arr[] ='<div style="width:100px;"><img style="width:100%;" src="'.$value->image.'"/> </div>';
              $s_arr[] =$value->vehicle_number;
              $s_arr[] =$value->type;
              $s_arr[] =$value->model;
              $s_arr[] =$value->seats;
              $s_arr[] ='<div><a href="#" class="btn btn-tbl-edit btn-xs"><i class="fa fa-pencil"></i></a><a class="btn btn-tbl-delete btn-xs"><i class="fa fa-trash-o "></i></a></div>';
              $arr[] =$s_arr;
           }
        
           $arrayName = array(
            'draw' => 1,
            'recordsTotal' => $data_count,
            'recordsFiltered' => $data_count,
            'data' =>$arr );
            return $arrayName ;
           // echo json_encode($arrayName);
           // exit();
    }

    /**
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){
         $vehicles_type = array(''=>'select vehicle type','SUV' => 'SUV','SUV' => 'SEDAN','SEDAN' => 'Crossover','Crossover' => 'Coupe','Coupe' => 'Van','Van' => 'Wagon');

        if ($request->isMethod('post')) {

            $data = $request->input('data');

            $string_date = strtotime($data['Vehicle']['insurance_renewal_date']);
            $data['Vehicle']['insurance_renewal_date'] = date("Y-m-d",$string_date);

            // $date=date_create_from_format("m/d/Y",$data['Vehicle']['insurance_renewal_date']);
            // $data['Vehicle']['insurance_renewal_date'] = date_format($date,"Y-m-d");

            $vehicle = Vehicle::create($data['Vehicle']);
            if($vehicle){
                $message = "New vehicle has been successfully created!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/vehicles/index');
        }else{
            return view('pages.vehicles.add')->with(compact('vehicles_type'));
        }
         
    }


    /**
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
         $vehicles_type = array(''=>'select vehicle type','SUV' => 'SUV','SUV' => 'SEDAN','SEDAN' => 'Crossover','Crossover' => 'Coupe','Coupe' => 'Van','Van' => 'Wagon');

         $vehicle_detail = Vehicle::where('id', '=', $id )->first();

        if ($request->isMethod('post')) {

            $data = $request->input('data');
            $string_date = strtotime($data['Vehicle']['insurance_renewal_date']);
            $data['Vehicle']['insurance_renewal_date'] = date("Y-m-d",$string_date);

            // $date=date_create_from_format("m/d/Y",$data['Vehicle']['insurance_renewal_date']);
            // $data['Vehicle']['insurance_renewal_date'] = date_format($date,"Y-m-d");
            
            $vehicle = Vehicle::find($id);
            //echo"<pre>";print_r($data);die;
            $vehicle->update($data['Vehicle']);
            if($vehicle){
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
            return view('pages.vehicles.edit')->with(compact('vehicles_type','vehicle_detail'));
        }
         
    }    

}
