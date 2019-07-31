<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fares;
use Session;
use Redirect;
class FaresController extends Controller
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
       return view('pages.fares.index'); 
    }

    /**
     * get vehicles using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){
           $data = Fares::select('*');
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
                    $q->orWhere('vehicle_type' ,'like', '%'.$search_value.'%')
                        ->orWhere('fare_pr_km' ,'like', '%'.$search_value.'%')
                        ->orWhere('minimum_fare' ,'like', '%'.$search_value.'%')
                        ->orWhere('waiting_fare' ,'like', '%'.$search_value.'%')
                        ->orWhere('minimum_distance' ,'like', '%'.$search_value.'%');                       
                });
            }
            // Sorting by column
            if($order != null){
                $data = $data->orderBy($order, $dir);                         
            }else{
                $data = $data->orderBy('vehicle_type', 'asc');
            }
            //data limt 
            $data = $data->offset($start)->limit($length)->get();
           $arr= array();
           foreach ($data as $value) {
              $s_arr = array();
              $s_arr['vehicle_type'] = $value->vehicle_type;
              $s_arr['fare_pr_km'] = $value->fare_pr_km;
              $s_arr['minimum_fare'] = $value->minimum_fare;
              $s_arr['minimum_distance'] = $value->minimum_distance;
              $s_arr['waiting_fare'] = $value->waiting_fare;
              $s_arr['actions'] ='<div><a href="'.url('admin/fares/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteFare('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
              $arr[] =$s_arr;
           }   
           // echo"<pre>"; print_r($arr);die;  
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
    * Add fares .
    */
    public function add(Request $request){
    	$vehicles_type = array(''=>'select vehicle type','SUV' => 'SUV','SEDAN' => 'SEDAN','Crossover' => 'Crossover','Coupe' => 'Coupe','Van' => 'Van','Wagon' => 'Wagon');
    	if ($request->isMethod('post')) {
            $data = $request->input('data');
            //echo"<pre>";print_r($data);die;
        	$fare = Fares::create($data['Fare']);
        	if($fare){
        		$message = "New fare has been successfully created!";
                $var     = "success";		
        	}else{
        		$message = "There is some problem while creating the fare. Please try again.";
                $var     = "error";
        	}
        	Session::flash($var , $message);
            return redirect('admin/fares/index');
        }else{
        	return view('pages.fares.add')->with(compact('vehicles_type'));	
        }
    }

    /**
     * Edit Fares .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
        $vehicles_type = array(''=>'select vehicle type','SUV' => 'SUV','SEDAN' => 'SEDAN','Crossover' => 'Crossover','Coupe' => 'Coupe','Van' => 'Van','Wagon' => 'Wagon');
        $fare_detail = Fares::where('id', '=', $id )->first();
        if ($request->isMethod('post')) {
            $data = $request->input('data');          
            $fare = Fares::find($id);
            $fare->update($data['Fare']);
            if($fare){
                $message = "fare has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the fare. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
			return redirect('admin/fares/index');
        }else{
            return view('pages.fares.edit')->with(compact('vehicles_type','fare_detail'));
        }
         
    }

    // Delete Fraes
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $fare = Fares::find($id);
                $delete = $fare->delete();
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
