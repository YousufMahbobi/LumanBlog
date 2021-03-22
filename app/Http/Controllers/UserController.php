<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;


class UserController extends Controller
{
    // Create New User
    public function add(Request $request){
        $request['api_token'] = Str::random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);
    }

    // Update User
    public function edit(Request $request,$id){
        $user = User::find($id);
        $user = update($request->all());
        return response()->json($user);
    }

    // Delete User
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json('Removed Successfully');
    }
    
    // Get All Users
    public function index(){
        $user = User::all();
        return response()->json($user);
    }

    // View User
    public function view($id){
        $user = User::find($id);
        return response()->json($user);
    }
}
?>