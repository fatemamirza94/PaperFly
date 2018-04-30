<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\Bankbranch;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class BankbranchController extends Controller
{
    public function index()

    {   $bankbranches = Bankbranch::all();
    	$banks = Bank::pluck('name','id');
    	return view('masterForms.bankbranch',compact('banks','bankbranches'));
    }

    public function store(Request $request)
    {
    	if($request->ajax())
        {
            $branches = Bankbranch::create($request->all());
            return response()->json($branches);
        }
    }
    public function edit(Request $request)
    {
        if($request->ajax())
        {
            $branches = Bankbranch::find($request->id);
            $branches->update($request->all());
            return response()->json($branches);
        }
    }

    public function update(Request $request)
    {
        if($request->ajax())
        {
            $branches = Bankbranch::find($request->id);
            $branches->update($request->all());
            return response()->json($branches);
        }
    }
    public function findbankname(Request $request)
    {
        $data=Bankbranch::select('location','bank_id')->where('bank_id',$request->id)->take(100)->get();
        return response()->json($data);
    }
  
     public function destroy(Request $request)
    {
        $bank = Bankbranch::find ($request->id)->delete();
        return response()->json();
    }



  

}
