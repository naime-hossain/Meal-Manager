<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bazar;
use App\Member;
use App\Period;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
class PeriodController extends Controller
{


    public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
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
          
         $periods=Period::all();
        if (!count($periods)) {
            # code...
            return response()->json(['message'=>'No Period forund'],404);
        }
        return response()->json(['content'=>$periods],200);
    }

  /**
     * Display the specified user bazars of specific period.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMemberBazar($period_id,$member_id)
    {
        //
             $period=Period::find($period_id);
         if (!$period) {
            # code...
            return response()->json(['message'=>'No period found'], 404);
         }
         $memberBazars=$period->bazars()->whereMember_id($member_id)->get();
         if (count($memberBazars)<=0) {
             # code...
            return response()->json(['content'=>$period,'message'=>'no bazar available for this member in this period'],200);
         }

      return response()->json(['content'=>$period,'bazars'=>$memberBazars],200);


  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'name' => 'required|unique:periods', 
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 404);
    }
    $input=$request->all();
    if ($new_period=Period::create($input)) {
        # code...
    //make all the period inactive if new is created and if periods exits.
    $periods=Period::all();
    if (count($periods)>0) {
        # code...
            foreach ($periods as $period) {
        if ($period->id!=$new_period->id) {
            # code...
            if ($period->status==1) {
                # code...
            $period->status=0;
            $period->save();
            }
         
        }
     }
    }
     return response()->json(['content'=>$new_period,'message'=>'period created succesfully'],200);
    }

  return response()->json(['message'=>'period not created succesfully'],404);

    }

    /**
     * Display all bazars of a single preiod.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          $period=Period::find($id);
         if (!$period) {
            # code...
            return response()->json(['message'=>'No period found'], 404);
         }
         $bazars=Bazar::where('period_id',$id)->get();
         if (count($bazars)<=0) {
             # code...
            return response()->json(['content'=>$period,'message'=>'no bazar available for this period'],200);
         }

      return response()->json(['content'=>$period,'bazars'=>$bazars],200);
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
        $period=Period::find($id);
        if(!$period){
            return response()->json(['message'=>'no such period available'],404);
        }
        //find all the bazar of this period
        $bazars=Bazar::where('period_id',$id);
        if ($period->delete()) {

            if (count($bazars)>0) {
                # code...
                  //delete all the bazar of this period

            foreach ($bazars as $bazar) {
                # code...
                $bazar->delete();
            }

            }
          return response()->json(['message'=>"$period->name period and all bazars deleted"],200);
        }
        return response()->json(['message'=>'period is not deleted'],404);

    }
}
