<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

        }else{

        }
         return view('pages.vehicles.add')->with(compact('vehicles_type'));
    }

}
