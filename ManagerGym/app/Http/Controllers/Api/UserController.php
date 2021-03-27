<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleId  = Role::where('name','admin')->first()->id;
        return  User::with('department','role')->where('role_id','<>',$roleId)->paginate(10);
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
    public function show(User $user)
    {
        if($user->role->name !='admin'){
            return User::with('role','department')->where('id',$user->id)->get();
        }else{
            return response()->json(['message'=>'ID không tồn tại'],404);
        }
      
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user->role->name!='admin'){
            return $user->update(request()->only('name','role_id','phone'));
        }else{
            return response()->json(['message'=>'ID NOT EXITS'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->role->name!='admin'){
            Department::where('id',$user->department_id)->update([
                'user_id'=>null
            ]);
            return $user->delete();
        }else{
            return response()->json([],401);
        }
    }
}
