<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller; 
use App\User; 
use App\Trip;
use App\Vehicle;
use App\Media;
use App\DriverRating;
use App\Driver;
use Auth; 
use Illuminate\Validation\Rule;
use Validator;
use Carbon\Carbon;
use DB;
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
            if(auth()->attempt(['email' => request('email'), 'password' => request('password')])){ 
                $user = auth()->user(); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['id'] =  $user->id; 
                return response()->json(['authenticated'=> true,'data' => $success], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['authenticated'=>false,'message'=>'your has been wrong email or password '], 401);
            }

        } 
    }

    /** 
     * user get user profile api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function profile(Request $request){
        $user = auth()->user();
        if($user){
            return response()->json(['authenticated'=> true,'data' => $user], $this-> successStatus);   
        }else{
            return response()->json(['authenticated'=> false,'message'=>'Your are not authenticated']);
        }
        
    }

    /** 
     * update user profile api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function updateprofile(Request $request){
        $auth = auth()->user();
        $user = User::where('id','=', $auth->id)->first();
        if($user){
            if($user->update((array)$request->all())){
                return response()->json(['authenticated'=> true,'data'=>$user,'message'=>'Successfully update'], $this-> successStatus); 
            }else{
                return response()->json(['authenticated'=> true,'message'=>'Something wrong']); 
            }
           
        }else{
            return response()->json(['authenticated'=> false,'message'=>'Your are not authenticated']); 
        }
         
    }
    /** 
     * update user password api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function updatepassword(Request $request){
       // return response()->json(['authenticated'=> false,'message'=>$request->all()]);
        $auth  = auth()->user();
        $user  = User::where('id','=', $auth->id)->first();
        $check =Auth::guard('web')->attempt(['email' =>$user->email, 'password' => request('oldpassword')]);
        if($check){
            $user= $user->update((array)$request->all());
            if($user){
                return response()->json(['authenticated'=> true,'message'=>'Successfully update'], $this-> successStatus); 
            }else{
                return response()->json(['authenticated'=> true,'message'=>'Something wrong']); 
            }
        }else{
            return response()->json(['authenticated'=> false,'message'=>'wrong current password']); 
        }
         
    }

    // logout 
    public function logoutApi(){ 
        if (Auth::check()) {
          $logout = Auth::user()->AauthAcessToken()->delete();
          if($logout){
            return response()->json(['authenticated'=>false,'message'=>'Logout successfully']); 
          }
        }
    }

    // This function will return a random 
    // string of specified length 
    function random_strings($length_of_string) 
    { 
      
        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      
        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result),  
                           0, $length_of_string); 
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
            'phone' => 'numeric|min:10|required|unique:users,phone',
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
           return response()->json(['validator_error'=>$validator->errors()], 401);       
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']);  
        $user_Code = $this->random_strings(5);
        $input['user_Code'] = bcrypt($user_Code);
        $user = User::create($input); 
        $updateuser = array('user_Code' => $user_Code.$user->id);
        $user->update($updateuser); 
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
                            ->where(function ($q)use ($current_time){
                               $q->whereDate('start_time', '>=', $current_time)
                               ->orWhereNull('start_time');
                            });
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
            $trip['driver_name'] =$value['drivers'] ? $value['drivers']->name :'';
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
        ->with('drivers','passengers','ratings');
        $value = $tripdetail->first();
        //echo"<pre>";print_r($value->ratings);die;
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
            $trip['driver_name'] =$value->drivers->name;
            $trip['driver_rating'] =$value->ratings->rating;
            if($vehicle){
                $trip['vehicle_name'] =$vehicle->model;
                $trip['vehicle_id'] =$vehicle->id;
                $trip['vehicle_type'] =$vehicle->type;
                $trip['vehicle_company'] =$vehicle->company_id;
            }
            $trip = (object) $trip;
        return response()->json(['data' => $trip], $this-> successStatus); 
    } 

    /** 
    * driver detail api 
    * 
    * @return in json
    */ 
    public function driverdetail(Request $request) {  
        $id = $request->id;
        $driver = User::where('id', '=',$id);
        $driver = $driver->with('driver')->first();
        $ratings = DriverRating::where('driver_id', '=', $id)->get();
        $total = $ratings->count();
        $sum = $ratings->sum(function($ratings) {
            return $ratings->rating;
        });
        $pro_pic = Media::where('module', '=', 'driver')
                    ->where('module_id', '=', $id)
                    ->where('submodule', '=', 'profile')
                    ->first();
        if($pro_pic){
           $driver->driver->profile =url('/').'/'.$pro_pic->file_path; 
        }

        $created = new Carbon($driver->created_at);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? 'today'
            : $created->diffForHumans($now);

        $driver->driver->rating = round($sum/$total);
        $driver->driver->experience =  $difference;
        return response()->json(['data' => $driver], $this-> successStatus); 
    }

    public function nearbydrivers($latitude,$longitude){
        // $search_drivers= Driver::selectRaw('*, ( 3959 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance')
        //      ->having('distance', '<',5)
        //      ->orderBy('distance');

       $return =  DB::table("drivers")
        ->select("*"
            ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
            * cos(radians(drivers.latitude)) 
            * cos(radians(drivers.longitude) - radians(" . $longitude . ")) 
            + sin(radians(" .$latitude. ")) 
            * sin(radians(drivers.latitude))) AS distance"))
            ->having('distance', '<',10)
            ->get();
        return $return;
    }

    // driver filter nearby rider 
    public function nearbyDriver(Request $request){
        $latitude= $request->latitude;
        $longitude=$request->longitude;       
        $search_drivers=$this->nearbydrivers($latitude,$longitude);
        $icon =url('/').\Storage::url('app/public/media/cab.png');
        return response()->json(['data' => $search_drivers,'icon'=>$icon], $this-> successStatus);
    }

    // book trip
    public function tripBook(Request $request){
        $apiurl =url('/').'/api/';
        //$client = new \Guzzle\Service\Client($apiurl);
        // $response = $client->get("tripbook/10")->send();
        // return $response;
        $latitude = $request->to_lat;
        $longitude = $request->to_long;
        $trip = new Trip();
        $trip->to = $request->to;
        $trip->to_lat = $request->to_lat;
        $trip->to_long = $request->to_long;
        $trip->to_lat_long = $request->to_lat_long;
        $trip->from_ = $request->from;
        $trip->from_lat = $request->from_lat;
        $trip->from_long = $request->from_long;
        $trip->from_lat_long = $request->from_lat_long;
        $trip->passenger_id = $request->passenger_id;
        $tripadd = $trip->save();
       // $message ="";
        if($tripadd){
            //$message ="Cab successfully booked";
           $assigndriver = $this->nearbydrivers($latitude,$longitude);

        }else{
            $message="server error";
            return response()->json(['data' => $message], $this-> successStatus);
        }  
    }

    // confirm driver
    public function confirmDriver(Request $request,$id){
        return response()->json(['data' => $id], $this-> successStatus);  
    }
    // confirm driver
    public function freeride(Request $request,$id){
        $user = Auth::user(); 
        $data = array('user_code' =>$user->user_Code);
        return response()->json(['data' => $data], $this-> successStatus);  
    }


    public function uploadfile(Request $request){

        // $user = Auth::user(); 
        // $data = array('user_code' =>$user->user_Code);
        // return response()->json(['data' => $data], $this-> successStatus);
         return response()->json(['file_uploaded'=>$_FILES]);
        if(!$request->hasFile('fileName')) {
        return response()->json(['upload_file_not_found'], 400);
        }

        $allowedfileExtension=['pdf','jpg','png'];
        $file = $request->file('fileName'); 
        $errors = [];
        
       // foreach ($files as $file) {      

            $extension = $file->getClientOriginalExtension();

            $check = in_array($extension,$allowedfileExtension);
              $mediaFiles = $request->fileName;
            if($check) {

                //foreach($request->fileName as $mediaFiles) {
                    
                    $media_ext = $mediaFiles->getClientOriginalName();
                    $media_no_ext = pathinfo($media_ext, PATHINFO_FILENAME);
                    $mFiles = $media_no_ext . '-' . uniqid() . '.' . $extension;
                   // print_r($mFiles);die('dj');
                    $mediaFiles->move(public_path().'/images/', $mFiles);
                    // $media = new Media();
                    // $media->filename = $mFiles;
                    // $media->module_id = $request->clientId;
                    // $media->module = Auth::user()->id;
                    // $media->save();
                    return response()->json(['file_uploaded'], 200);
               // }
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
        //}  
    }


}