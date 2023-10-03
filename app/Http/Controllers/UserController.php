<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userListPage(){
        $user_list = User::get();
        return view('admin.forms.userlist',compact('user_list'));
    }

    public function activeUser($id){
         $active_user = User::find($id);
         $active_user->active_user = 1;
         $active_user->save();

         return back()->with('info', 'User InActivated Successfully');
    }

    public function inactiveUser($id){
        $inactive_user = User::find($id);
        $inactive_user->active_user = 0;
        $inactive_user->save();       
        return back()->with('info', 'User Activated Successfully');
   }
}
