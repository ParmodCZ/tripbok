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
           $data = Vehicle::all();
           $data_count = $data->count();
            // echo"<pre>";print_r($data_count);die;
           $arr= array();
           foreach ($data as $value) {
              $s_arr = array();
              $s_arr[] ='<img src="'.$value->image.'" style="width:100%;"/>';
              $s_arr[] =$value->name;
              $s_arr[] =$value->type;
              $s_arr[] =$value->model;
              $s_arr[] =$value->seats;
              $s_arr[] =$value->price_pr_km;
              $arr[] =$s_arr;
           }
        
           $arrayName = array(
            'draw' => 1,
            'recordsTotal' => $data_count,
            'recordsFiltered' => $data_count,
            'data' =>$arr );
            //return $arrayName ;
           echo json_encode($arrayName);
           exit();
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
        }else{
            return view('pages.vehicles.edit')->with(compact('vehicles_type','vehicle_detail'));
        }
         
    }    

}
