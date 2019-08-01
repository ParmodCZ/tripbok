<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
use Session;
use Redirect;
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
     * get Trips using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){

		$tripis ='booked';
		// $tripis   = $request->post("tripis");
		//->where('status', '=', $tripis)
        $data = Trip::select('*')->with('drivers','passengers');
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
        if($order != null){
        	if($order=='driver_name'){
        		$data = $data->orderBy('drivers.name', $dir);
        	}else if($order=='passenger_name'){
        		$data = $data->orderBy('passengers.name', $dir);
        	}else{
        		$data = $data->orderBy($order, $dir);
        	}                          
        }else{
            $data = $data->orderBy('id', 'asc');
        }
        //data limt 
        $data = $data->offset($start)->limit($length)->get();
       $arr= array();
        foreach ($data as $value) {
        	$s_arr = array();
            $s_arr['trip_id'] =  $value->id;
            $s_arr['driver_name']   =  $value->drivers->name;
            $s_arr['passenger_name']   =  $value->passengers->name;
            $s_arr['form'] =  $value->from;
            $s_arr['to'] =  $value->to;
            $s_arr['actions'] ='<div><a href="'.url('admin/trips/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteTrip('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
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

    	$status = array('active'=>'active','completed' => 'completed','booked' => 'booked','cancelled'=>'cancelled');
        $confirm = array(0 =>'No',1=>'Yes' );
        if ($request->isMethod('post')) {
            $data = $request->input('data');
            $driver = Trip::create($data['Trip']);     
            if($driver){
                $message = "New Trip has been successfully created!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
            return redirect('admin/trips/index');
        }else{
            return view('pages.trips.add')->with(compact('status','confirm'));
        }  
    }


    /**
     * Add vehicles .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
        $status = array('active'=>'active','completed' => 'completed','booked' => 'booked','cancelled'=>'cancelled');
        $confirm = array(0 =>'No',1=>'Yes' );
        $trip_detail = Trip::where('id', '=', $id )->first();       
  
        //echo"<pre>";print_r($vehicle_detail);die;
        if ($request->isMethod('post')) {
            $data = $request->input('data');          
            $trip = Trip::where('id', '=', $id )->first();
            $trip->update($data['Trip']);
            if($trip){
                $message = "driver has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
          // return Redirect::back();
           return redirect('admin/trips/index');
        }else{
            return view('pages.trips.edit')->with(compact('status','trip_detail','confirm'));
        }
         
    }  

    // Delete Trips
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $trip = Trip::find($id);
                $delete = $trip->delete();
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
