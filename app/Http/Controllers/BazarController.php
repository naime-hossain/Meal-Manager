<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bazar;
use App\User;
use App\Period;
class BazarController extends Controller
{
    

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bazars=Bazar::all();
        if (!count($bazars)) {
            # code...
            return response()->json(['message'=>'No Bazar forund'],401);
        }
        return response()->json(['content'=>$bazars],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::pluck('name');
        if (count($users)>0) {
            # code...

        }else{
            $users='No user found';
        }
        $period=Period::where('status',1)->first();

        if (count($period)>0) {
            # code...
            $active_period=$period->name;
        }else{
            $active_period='no active period available';
        }

     return response()->json(['users'=>$users,'period'=>$active_period],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //
    $validator = \Validator::make($request->all(), [
        'period' => 'required', 
        'user_name' => 'required',
        'amount' => 'required',
        'date' => 'required',
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 422);
    }
        $input=$request->all();
        //retriving period id from period name
        $period=Period::whereName($input['period'])->first();
        $input['period_id']=$period->id;
        //retriving user_id from user name
        $user=User::whereName($input['user_name'])->first();
        $input['user_id']=$user->id;

        unset($input['period']);
        unset($input['user_name']);
        $bazar=Bazar::create($input);
        if ($bazar) {
            return response()->json(['content'=>$bazar,'message'=>'Bazar created succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar created'],401);
        

         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bazar=Bazar::find($id);
         if (!$bazar) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 422);
        }
    return response()->json(['content'=>$bazar,'message'=>'Bazar updated succesfully'],200); 

        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input=$request->all();
        $bazar=Bazar::find($id);
        if (!$bazar) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 422);
        }
        if (!count($input)) {
            # code...
             return response()->json(['message'=>'No Bazar updated'],401);
        }
        if ($bazar->update($input)) {
            
            return response()->json(['content'=>$bazar,'message'=>'Bazar updated succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar updated'],401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bazar=Bazar::find($id);
        if (!$bazar) {
            # code...
             return response()->json(['message'=>'No Bazar found'],401);
        }
        if ($bazar->delete()) {
            
            return response()->json(['content'=>$bazar,'message'=>'Bazar deleted succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar updated'],401);
    }
}

