<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Division::all();
        return view('masterForms.division',compact('division'));
    }

    public function landing()
    {
        return view('masterForms.landingpage');
    }

    
  
    public function store(Request $request)
    {
        $rules = array(
        'code'=>'required',	
        'name'=>'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
          return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else {
        $division = new Division;
        $division->code = $request->code;
        $division->name = $request->name;
        $division->save();
        return response()->json($division);
    }
    }

    
    public function update(Request $request)
    {
        $division = Division::find($request->id);
        $division->code = $request->code;
        $division->name = $request->name;
        $bank->save();
        return response()->json($division);
    }

    
    public function destroy(Request $request)
    {
        $division = Division::find ($request->id)->delete();
        return response()->json();
    }

}
