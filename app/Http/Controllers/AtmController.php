<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Thana;
use App\Bank;
use App\Atm;
class AtmController extends Controller
{
   public function index(){
   		$atm=Atm::all();
        $atmdistrict=District::all();
		$atmthana=Thana::all();//get data from table
		$atmbank=Bank::all();
		return view('MasterForms.atmlist',compact('atm','atmthana','atmdistrict','atmbank'));//sent data to view

	} 
 /*public function atmfunct(){
        $atmdistrict=District::all();
		$atmthana=Thana::all();//get data from table
		return view('MasterForms.atmlist',compact('atmthana','atmdistrict'));//sent data to view

	}*/
	public function findThanaName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Thana::select('name','id','district_id')->where('district_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}
    
     public function store(Request $request)
    {
    	if($request->ajax())
        {
            $atm = Atm::create($request->all());
            return response($atm);
        }
     }


}
