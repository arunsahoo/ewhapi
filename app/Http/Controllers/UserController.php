<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Users
        $users = User::paginate(10);

        // Return collection of users as a resource
        return UserResource::collection($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create/ Update User data
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;

        $user->id = $request->input('id');
        $user->UserGroupID = $request->input('UserGroupID');
        $user->EmailID = $request->input('EmailID');
        $user->PhoneNo = $request->input('PhoneNo');
        $user->UName = $request->input('UName');
        $user->Password = md5($request->input('Password'));
        $user->FName = $request->input('FName');
        $user->LName = $request->input('LName');
        $user->Address = $request->input('Address');
        $user->City = $request->input('City');
        $user->State = $request->input('State');
        $user->Country = $request->input('Country');
        $user->ZipCode = $request->input('ZipCode');
        $user->Status = $request->input('Status');

        if($user->save()){
            return new UserResource($user);
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
        // Get User
        $user =  User::findOrFail($id);

        // Return single User as a resource
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get User
        $user =  User::findOrFail($id);

        if($user->delete()){
            return new UserResource($user);
        }
    }
}
