<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
class MemberController extends Controller
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
        $members=Member::all();
        if (!count($members)) {
            # code...
            return response()->json(['message'=>'No member forund'],404);
        }
        return response()->json(['content'=>$members],200);
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
        'name' => 'required|unique:members', 
        
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 404);
    }

        $input=$request->all();
        $member=Member::create($input);
        if ($member) {
            return response()->json(['content'=>$member,'message'=>'member created succesfully'],200);   
             
        }
         return response()->json(['message'=>'No member created'],404);
        

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
          $member=Member::find($id);
         if (!$member) {
            # code...
            return response()->json(['message'=>'No member found'], 404);
         }
         $member_bazars=$member->bazars;
         if (count($member_bazars)<=0) {
             # code...
            return response()->json(['content'=>$member,'message'=>'no bazar available for this member'],200);
         }

      return response()->json(['content'=>$member,'bazars'=>$member_bazars],200); 
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
          $member=Member::find($id);
         if (!$member) {
            # code...
            return response()->json(['message'=>'No member found'], 404);
        }
    return response()->json(['content'=>$member],200); 
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
        $member=Member::findOrFail($id);
        if (!count($input)) {
            # code...
             return response()->json(['message'=>'No member updated'],404);
        }
        if ($member->update($input)) {
            
            return response()->json(['content'=>$member,'message'=>'member updated succesfully'],200);   
             
        }
         return response()->json(['message'=>'No member updated'],404);
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
        $member=Member::find($id);
        if (!$member) {
            # code...
             return response()->json(['message'=>'No member found'],404);
        }
        if ($member->delete()) {
        	//delete the member bazar too
             if (count($member->bazars)>0) {
             	# code...
             	 $member->bazars()->delete();
             }
           
            return response()->json(['content'=>$member,'message'=>'member and his/her bazars deleted succesfully'],200);   
             
        }
         return response()->json(['message'=>'No member updated'],404);
    }
}
