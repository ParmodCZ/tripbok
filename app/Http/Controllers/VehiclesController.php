<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vehicle;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){
         $vehicles_type = array(''=>'select vehicle type','SUV' => 'SUV','SUV' => 'SEDAN','SEDAN' => 'Crossover','Crossover' => 'Coupe','Coupe' => 'Van','Van' => 'Wagon');

        if ($request->isMethod('post')) {

            $data = $request->input('data');

            $date=date_create_from_format("d/m/Y",$data['Vehicle']['insurance_renewal_date']);
            $data['Vehicle']['insurance_renewal_date'] = date_format($date,"Y/m/d");
            //cho $insurance_renewal_date;die();
            $vehicle = Vehicle::create($data['Vehicle']);
            if($vehicle){
                echo"yes";
            }else{
                echo"no";
            }
        }else{
            return view('pages.vehicles.add')->with(compact('vehicles_type'));
        }
         
    }

}
