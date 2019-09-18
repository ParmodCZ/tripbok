<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Session;
use Redirect;
class CouponController extends Controller
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
     * Coupons index .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
       return view('pages.coupons.index'); 
    }

    /**
     * get Coupons using ajax .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_ajax(Request $request){
       $data = Coupon::select('*');
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
                $q->orWhere('coupon_code' ,'like', '%'.$search_value.'%')
                    ->orWhere('discount' ,'like', '%'.$search_value.'%')
                    ->orWhere('expired' ,'like', '%'.$search_value.'%');
                    
            });
        }
        // Sorting by column
        if($order != null){

            $data = $data->orderBy($order, $dir);
                      
        }else{
            $data = $data->orderBy('expired', 'asc');
        }

        //data limt 
        $data = $data->offset($start)->limit($length)->get();

       $arr= array();
       foreach ($data as $value) {

          $s_arr = array();
          $s_arr['coupon_code'] =$value->coupon_code;
          $s_arr['discount'] =$value->discount;
          $s_arr['expired'] =$value->expired;
          $s_arr['actions'] ='<div><a href="'.url('admin/coupons/edit').'/'.$value->id.'" class="btn btn-tbl-edit btn-xs"><i class="fas fa-pencil-alt"></i></a><a href="javascript:void(0)" onclick="deleteCoupon('.$value->id.', this)" class="btn btn-tbl-delete btn-xs"><i class="fas fa-trash-alt"></i></a></div>';
          $arr[] =$s_arr;
       }
    //echo"<pre>";print_r($arr);die;
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
    * ganrate coupon .
    *
    * @return coupon number
    */
    private function ganrate($length=null,$prefix=null,$Suffix=null){
    	$l= 0;
    	if($prefix){
    		$l += strlen($prefix);
    	}
    	if($Suffix){
    		$l += strlen($Suffix);
    	}
    	$len =$length-$l;
    	if($len > 0){
    		$str = str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',$len);
	    	$coupon = $prefix.substr(str_shuffle($str),0,$len).$Suffix;
			return $coupon;
    	}
    }
    /**
    * add coupon .
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function add(Request $request){       
        if($request->isMethod('post')){
       		$data = $request->input('data');
       		$string_date = strtotime($data['Coupon']['expired']);
            $data['Coupon']['expired'] = date("Y-m-d",$string_date);
            $cn  = $data['Coupon']['nubmerofconpon'];
            $cl  = $data['Coupon']['lengthofconpon'];
            $pre = $data['Coupon']['prefix'];
            $suf = $data['Coupon']['suffix'];
            $done = false;
            for($i=0; $i<$cn; $i++){
            	$data['Coupon']['coupon_code'] = $this->ganrate($cl,$pre,$suf);
            	if($data['Coupon']['coupon_code']){
            		Coupon::create($data['Coupon']);
            		$done =true;
            	}else{
            		break;
            	}
            }
            if($done){
            	$message = "eamil has been successfully sent!";
            	$var     = "success";
            }else{
            	$message = "There is some problem while add the coupons. Please try again.";
                $var     = "error";
            }		
            Session::flash($var , $message);
            return redirect('admin/coupons/add');
        }else{
        	return view('pages.coupons.add'); 	
        }
    }

    /**
     * edit coupon .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, Request $request){
        $coupon_detail = Coupon::where('id', '=', $id )->first();
        if ($request->isMethod('post')) {
            $data = $request->input('data');
            $string_date = strtotime($data['Coupon']['expired']);
            $data['Coupon']['expired'] = date("Y-m-d",$string_date);       
            $coupon = Coupon::find($id);
            $coupon->update($data['Coupon']);
            if($coupon){
                $message = "coupon has been successfully update!";
                $var     = "success";
            }else{
                $message = "There is some problem while creating the show. Please try again.";
                $var     = "error";
            }
            Session::flash($var , $message);
           //return Redirect::back();
            return redirect('admin/coupons/index');
        }else{
            return view('pages.coupons.edit')->with(compact('coupon_detail'));
        }
         
    }  
    // Delete Vehicles
    public function delete(Request $request){
        if ($request->isMethod('post')) {
            $post_data =  $request->all();
            if(!empty($post_data)){
                $id = $post_data['id'];
                $coupon = Coupon::find($id);
                $delete = $coupon->delete();
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
