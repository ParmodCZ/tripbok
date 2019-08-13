<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Trip;
use App\Vehicle;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\Rule;
use Validator;
class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['validator_error'=>$validator->errors()], 401);            
        }else{
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['id'] =  $user->id; 
                return response()->json(['authenticated'=> true,'data' => $success], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['authenticated'=>false], 401); 
            }

        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users,email', 
            'phone' => 'required|unique:users,phone',
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        $success['id'] =  $user->id;
        return response()->json(['authenticated'=>true,'data'=>$success], $this-> successStatus); 
    }

    /** 
     * assigned vehicle to driver 
     * 
     * @return object
     */ 
    public function assignedVehilceToDriver($driver_id =false,$vehicle_id =false){
        $vehicle ='';
        if($vehicle_id){
            $vehicle = Vehicle::where('id', '=', $vehicle_id)->first();
        }
        if($driver_id){
            $vehicle = Vehicle::where('driver_id', '=', $driver_id)->first();
        }
        //echo"<pre>";print_r($vehicle);die('hhs');
        return $vehicle;
    }

    /** 
     * comma separated string to array
     * 
     * @return string
     */ 
    public function commaseparated($value=''){
        $string ='';
        if ($value) {
            $stgary = explode(',', $value);
             $string = $stgary[0];
        }
        return $string;
    }

    /** 
    * change date format
    * format Y-m-d H.i.s
    * @return string
    */ 
    public function cgangeDateformat($realdate=''){
        $date ='';
        if ($realdate) {
            $converted = date('d M Y h.i.s A', strtotime($realdate));
            $date = date('Y-m-d H.i A', strtotime($converted));
        }
        return $date;
    }
    /** 
     * trips listing api 
     * 
     * @return in json
     */ 
    public function alltrips(Request $request) {  
        $current_time = date('Y-m-d H:i:s');
        $type = $request->type;
        $user_id = $request->user_id;
        $tripdetail =Trip::with('drivers','passengers');
        if($type =='past'){
            $tripdetail = $tripdetail->where('passenger_id', '=', $user_id)
                            ->whereDate('start_time', '<', $current_time);
        }else if($type =='upcoming'){
            $tripdetail = $tripdetail->where('passenger_id', '=', $user_id)
                            ->whereDate('start_time', '>=', $current_time);
        }else{
          $tripdetail = $tripdetail->where('passenger_id', '=', $user_id);  
        }
        $tripdetail = $tripdetail->get();
        $retundata = array();
        foreach ($tripdetail as $value) {
            $vehicle = $this->assignedVehilceToDriver($value->driver_id);
            $trip = array();
            $trip['trip_id'] =$value->id;
            $trip['to'] =$this->commaseparated($value->to);
            $trip['from'] =$this->commaseparated($value->from_);
            $trip['start_time'] =$this->cgangeDateformat($value->start_time);
            $trip['end_time'] =$this->cgangeDateformat($value->end_time);
            $trip['fare'] =$value->fare;
            $trip['route_map'] =$value->route_map;
            $trip['status'] =$value->status;
            $trip['is_confirmed'] =$value->is_confirmed;
            $trip['driver_id'] =$value->driver_id;
            $trip['driver_name'] =$value['drivers']->name;
            if($vehicle){
                $trip['vehicle_name'] =$vehicle->model;
                $trip['vehicle_id'] =$vehicle->id;
                $trip['vehicle_type'] =$vehicle->type;
                $trip['vehicle_company'] =$vehicle->company_id;
            }
            $retundata[]= $trip;
        }
        return response()->json(['data' => $retundata], $this-> successStatus); 
    } 

    /** 
     * trips detail api 
     * 
     * @return in json
     */ 
    public function tripdetail(Request $request) {  
        $current_time = date('Y-m-d H:i:s');
        $id = $request->id;
        $user_id = $request->user_id;
        $tripdetail =Trip::where('passenger_id', '=', $user_id)
        ->where('id', '=',$id)
        ->with('drivers','passengers');
        $value = $tripdetail->first();
            $trip = array();
            $vehicle = $this->assignedVehilceToDriver($value->driver_id);
            $trip['full_to'] =$value->to;
            $trip['full_from'] =$value->from_;
            $trip['to'] =$this->commaseparated($value->to);
            $trip['from'] =$this->commaseparated($value->from_);
            $trip['start_time'] =$this->cgangeDateformat($value->start_time);
            $trip['end_time'] =$this->cgangeDateformat($value->end_time);
            $trip['fare'] =$value->fare;
            $trip['route_map'] =$value->route_map;
            $trip['status'] =$value->status;
            $trip['is_confirmed'] =$value->is_confirmed;
            $trip['driver_id'] =$value->driver_id;
            $trip['driver_name'] =$value['drivers']->name;
            $trip['driver_rating'] =$value['drivers']->rating;
            if($vehicle){
                $trip['vehicle_name'] =$vehicle->model;
                $trip['vehicle_id'] =$vehicle->id;
                $trip['vehicle_type'] =$vehicle->type;
                $trip['vehicle_company'] =$vehicle->company_id;
            }
            $trip = (object) $trip;
        return response()->json(['data' => $trip], $this-> successStatus); 
    } 

}