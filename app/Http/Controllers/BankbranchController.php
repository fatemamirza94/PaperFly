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
            return response($branches);
        }
    }
    public function edit(Request $request)
    {
        if($request->ajax())
        {
            $branches = Bankbranch::find($request->id);
            $branches->update($request->all());
            return response($branches);
        }
    }

    public function update(Request $request)
    {
        if($request->ajax())
        {
            $branches = Bankbranch::find($request->id);
            $branches->update($request->all());
            return response($branches);
        }
    }

    /*public function find($id)
    {
        return Bankbranch::join('banks','banks.id','=','bankbranches.bank_id')->selectRaw('banks.name','bankbranches.id')->where('bankbranches,id',$id)->bank();
    }*/

     public function destroy(Request $request)
    {
        $bank = Bankbranch::find ($request->id)->delete();
        return response()->json();
    }

  

}
