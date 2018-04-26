<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('masterForms.banks',compact('banks'));
    }

    public function landing()
    {
        return view('masterForms.landingpage');
    }

    
  
    public function store(Request $request)
    {
        $rules = array(
        'name'=>'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
          return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else {
        $bank = new Bank;
        $bank->name = $request->name;
        $bank->save();
        return response()->json($bank);
    }
    }

    
    public function update(Request $request)
    {
        $bank = Bank::find($request->id);
        $bank->name = $request->name;
        $bank->save();
        return response()->json($bank);
    }

    
    public function destroy(Request $request)
    {
        $bank = Bank::find ($request->id)->delete();
        return response()->json();
    }
}
