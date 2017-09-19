<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuthExceptions\JWTException;
class AdminController extends Controller
{
   

    public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the login method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
    // $this->middleware('jwt.auth', ['except' => ['login']]);
    $this->middleware('jwt.auth')->except('login','register');
   }

 public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

          
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
              }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
         $user=User::whereEmail($request->email)->first();
        // if no errors are encountered we can return a JWT
        return response()->json(['token'=>$token,'user'=>$user]);
    }


//register user
public function register(Request $request){

  $validator = \Validator::make($request->all(), [
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6|confirmed',
        
        ]);

    if ($validator->fails()) {
       return response()->json($validator->errors(), 404);
    }
    $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

    //login the user
    if ($user) {
        $input=$request->only('email', 'password');
        try {
            // verify the input and create a token for the user
            if (! $token = JWTAuth::attempt($input)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(['token'=>$token,'user'=>$user]);
    }

}



     public function logout($token)
    {
        //
        // JWTAuth::invalidate($token);
        return response()->json(['message'=>'you are logout']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        if (Auth::user()->id==$id) {
            $user=User::find($id);
            $input=$request->all();
            //bcrypt the password
            if ($request->password) {
               $input[password]=bcrypt($request->password);
            }

            $user->update($input);
            return response()->json(['content'=>$user,'message'=>'Info Updated']);

        }
        return response()->json(['message'=>'You are not authrized for this action']);
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
    }
}
