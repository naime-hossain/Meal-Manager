<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bazar;
use App\Member;
use App\Period;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
use Illuminate\Support\Facades\Auth;
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
        $user=Auth::user();
           
         
         $bazars=$user->bazars;
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


       $user=Auth::user();
           
        
    $validator = \Validator::make($request->all(), [
        'period' => 'required', 
        'member_name' => 'required',
        'amount' => 'required',
        'date' => 'required',
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 404);
    }
        $input=$request->all();
        //retriving period id from period name
        $period=$user->periods()->whereName($input['period'])->first();
         if ($period) {
                    $input['period_id']=$period->id;
                //retriving member_id from member name
               $member=$user->members()->whereName($input['member_name'])->first();

                 if ($member) {
                      $input['member_id']=$member->id;

                unset($input['period']);
                unset($input['member_name']);
                $bazar=Bazar::create($input);
                if ($bazar) {
                    return response()->json(['content'=>$bazar,'message'=>'Bazar created succesfully'],200);   
                     
                }
                 return response()->json(['message'=>'No Bazar created'],404);
                 }
                 return response()->json(['message'=>'member not found'],404);
              
         }
           return response()->json(['message'=>'period not found'],404);
      
       
        

         }

    /**
     * Display the specified bazar details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $user=Auth::user();
           $bazar=$user->bazars()->find($id);
       
         
         if (!$bazar) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 404);
        }
           // $bazar['member_name']=$bazar->member->name;
         /* without apbe line laravel add member info just doing this?*/
        $member_name=$bazar->member->name;
    return response()->json(['content'=>$bazar],200); 
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
            $user=Auth::user();
          $bazar=$user->bazars()->whereId($id)->first();
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
           $user=Auth::user();
          $bazar=$user->bazars()->find($id);
           
        
        $input=$request->all();
        
        if (!$bazar) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 404);
        }
        if (!count($input)) {
            # code...
             return response()->json(['message'=>'No Bazar updated'],404);
        }

        //if period and user change
        
       
        if (isset($input['period'])) {
            # code...
              //retriving period id from period name
        
         $period=$user->periods()->whereId($input['period'])->first();
        $input['period_id']=$period->id;
        }

          if (isset($input['member_name'])) {
             //retriving member_id from member name
        $member=$user->members()->whereName($input['member_name'])->first();
        $input['member_id']=$member->id;
        }

        unset($input['period']);
        unset($input['member_name']);

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
            $user=Auth::user();
          $bazar=$user->bazars()->find($id);
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

