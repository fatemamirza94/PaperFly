<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thana;
use App\District;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class ThanaController extends Controller
{
     public function index()

    {   $thana = Thana::all();
        $districtThanas = District::pluck('name','id');
        return view('masterForms.thana',compact('thana','districtThanas'));
    }

    public function store(Request $request)
    {
        if($request->ajax())
        {
            $thana = thana::create($request->all());
            return response($thana);
        }
     }

    public function edit(Request $request)
    {
        if($request->ajax())
        {
            $thana = thana::find($request->id);
            $thana->update($request->all());
            return response($thana);
        }
    }
    public function update(Request $request)
    {
        if($request->ajax())
        {
            $thana = thana::find($request->id);
            $thana->update($request->all());
            return response($thana);
        }
    }
    /*public function find($id)
    {
        return Bankbranch::join('banks','banks.id','=','bankbranches.bank_id')->selectRaw('banks.name','bankbranches.id')->where('bankbranches,id',$id)->bank();
    }*/
     public function destroy(Request $request)
    {
        $thana = thana::find ($request->id)->delete();
        return response()->json();
    }
        
    
    	
   } 
