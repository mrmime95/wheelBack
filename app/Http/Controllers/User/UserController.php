<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function user(){
        return response()->json(User::get(), 200);
    }

    public function userById($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        return response()->json(User::find($id), 200);
    }

    public function userSave(Request $request){
        $rules = [
        'name' => 'required|min:3',
        'email'=> 'required',
        'password'=> 'required|min:4'];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(), 404);
        }
        $user = User::create($request->all());
        return response()->json($user, 200);
    }

    public function userUpdate(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        $user->update($request->all());
        return response()->json($user, 200);
    }


    public function userDelete(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        $user->delete();
        return response()->json(null, 204);
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('email')) {
            $this->validate($request, [
                'email' => 'required|email',
            ]);

            $resp = User::firstWhere('email', $request->email);
            return response()->json(['userExists' => $resp != null], 200);
        }
        return response()->json(User::get(), 200);
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
        $rules = [
        'name' => 'required|min:3',
        'email'=> 'required',
        'password'=> 'required|min:4'];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(), 404);
        }
        $user = User::create($request->all());
        return response()->json($user, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        return response()->json(User::find($id), 200);
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
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        $user->update($request->all());
        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }

        $user->delete();
        return response()->json(null, 204);
    }
}
