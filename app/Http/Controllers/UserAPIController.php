<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;

class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = UserModel::where('status',1)->get();

        $result = [
            'data' => $users,
            'code' => 200,
            'message' => 'listing users successfully!',
        ];

        return response()->json($result);
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
        $validatedData = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
        ]);

        if($validatedData){

            $fullname = $request->fullname;
            $email = $request->email;
            $status = 1;


            $user = new UserModel;
            $user->fullname = $fullname;
            $user->email = $email;
            $user->save();

            $result = [
                'data' => $user,
                'code' => 200,
                'message' => 'inserted user successfully!',
            ];
    
            return response()->json($result);

        }
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
    public function update(Request $request,$id)
    {
        if($id){
            $fullname = $request->fullname;
            $email = $request->email;

            $user = UserModel::findOrFail($id);

            $user->fullname = $fullname;
            $user->email = $email;

            $user->save();

            $result = [
                'data' => $user,
                'code' => 200,
                'message' => 'updated user successfully!',
            ];
    
            return response()->json($result);


            
        }else{

            $result = [
                'data' => [],
                'code' => 500,
                'message' => 'invalid user id!!',
            ];
    
            return response()->json($result); 
        }
       
       
       
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
        if($id){
            $user = UserModel::findOrFail($id);

            $user->status = 0;

            $user->save();

            $result = [
                'data' => $user,
                'code' => 200,
                'message' => 'deleted user successfully!',
            ];
            return response()->json($result);  
        }
        
    }
}
