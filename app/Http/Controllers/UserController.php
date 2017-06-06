<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        if (!count($users)) {
            # code...
            return response()->json(['message'=>'No user forund'],401);
        }
        return response()->json(['content'=>$users],200);
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
        'name' => 'required|unique:users', 
        
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 422);
    }

        $input=$request->all();
        $user=User::create($input);
        if ($user) {
            return response()->json(['content'=>$user,'message'=>'user created succesfully'],200);   
             
        }
         return response()->json(['message'=>'No user created'],401);
        

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
          $user=User::find($id);
         if (!$user) {
            # code...
            return response()->json(['message'=>'No Bazar found'], 422);
        }
    return response()->json(['content'=>$user,'message'=>'Bazar updated succesfully'],200); 
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
        $user=User::findOrFail($id);
        if (!count($input)) {
            # code...
             return response()->json(['message'=>'No user updated'],401);
        }
        if ($user->update($input)) {
            
            return response()->json(['content'=>$user,'message'=>'user updated succesfully'],200);   
             
        }
         return response()->json(['message'=>'No user updated'],401);
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
        $user=User::find($id);
        if (!$user) {
            # code...
             return response()->json(['message'=>'No user found'],401);
        }
        if ($user->delete()) {
            
            return response()->json(['content'=>$user,'message'=>'user deleted succesfully'],200);   
             
        }
         return response()->json(['message'=>'No user updated'],401);
    }
}
