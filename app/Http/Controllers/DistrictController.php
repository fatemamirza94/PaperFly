<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class DistrictController extends Controller
{
    public function index()

    {   $district = District::all();
    	$divisionDistricts = Division::pluck('name','id');
    	return view('masterForms.district',compact('district','divisionDistricts'));
    }

    public function store(Request $request)
    {
    	if($request->ajax())
        {
            $district = District::create($request->all());
            return response($district);
        }
     }

    public function edit(Request $request)
    {
        if($request->ajax())
        {
            $district = District::find($request->id);
            $district->update($request->all());
            return response($district);
        }
    }
    public function update(Request $request)
    {
        if($request->ajax())
        {
            $district = District::find($request->id);
            $district->update($request->all());
            return response($district);
        }
    }
    /*public function find($id)
    {
        return Bankbranch::join('banks','banks.id','=','bankbranches.bank_id')->selectRaw('banks.name','bankbranches.id')->where('bankbranches,id',$id)->bank();
    }*/
     public function destroy(Request $request)
    {
        $district = District::find ($request->id)->delete();
        return response()->json();
    }
    	
    

}
