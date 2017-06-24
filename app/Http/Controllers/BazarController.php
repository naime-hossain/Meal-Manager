<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bazar;
use App\Member;
use App\Period;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
class BazarController extends Controller

{
       public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the member from retrieving their token if they don't already have it
       $this->middleware('jwt.auth');
   }

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
            return response()->json(['message'=>'No Bazar forund'],404);
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
        'period_id' => 'required', 
        'member_id' => 'required',
        'amount' => 'required',
        'date' => 'required',
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 404);
    }
        $input=$request->all();
        // //retriving period id from period name
        // $period=Period::find($input['period_id']);
        // $input['period_id']=$period->id;
        //retriving member_id from member name
        // $member=Member::whereName($input['member_id'])->first();
        // $input['member_id']=$member->id;

        // unset($input['period']);
        // unset($input['member_name']);
        $bazar=Bazar::create($input);
        if ($bazar) {
            return response()->json(['content'=>$bazar,'message'=>'Bazar created succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar created'],404);
        

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
          $bazar=Bazar::find($id);
          $bazar['member_name']=$bazar->member->name;
         if (!$bazar) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 404);
        }
    return response()->json(['content'=>$bazar,'message'=>'Bazar updated succesfully'],200); 
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
            return response()->json(['message'=>'No Bazar found'], 404);
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
            return response()->json(['message'=>'No Bazar found'], 404);
        }
        if (!count($input)) {
            # code...
             return response()->json(['message'=>'No Bazar updated'],404);
        }

        //if period and user change
        
       
        // if ($input['period']) {
        //     # code...
        //       //retriving period id from period name
        // $period=Period::whereName($input['period'])->first();
        // $input['period_id']=$period->id;
        // }

        //   if ($input['member_name']) {
        //      //retriving member_id from member name
        // $member=Member::whereName($input['member_name'])->first();
        // $input['member_id']=$member->id;
        // }

        // unset($input['period']);
        // unset($input['member_name']);

        if ($bazar->update($input)) {
            
            return response()->json(['content'=>$bazar,'message'=>'Bazar updated succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar updated'],404);
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
             return response()->json(['message'=>'No Bazar found'],404);
        }
        if ($bazar->delete()) {
            
            return response()->json(['content'=>$bazar,'message'=>'Bazar deleted succesfully'],200);   
             
        }
         return response()->json(['message'=>'No Bazar deleted'],404);
    }
}

