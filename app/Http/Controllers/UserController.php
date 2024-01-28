<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userListPage()
    {
        $user_list = User::where('id', '!=', 1)->get();
        return view('admin.forms.user.userlist', compact('user_list'));
    }

    public function activeUser($id)
    {
        $active_user = User::find($id);
        $active_user->active_user = 1;
        $active_user->save();

        return back()->with('info', 'User InActivated Successfully');
    }

    public function inactiveUser($id)
    {
        $inactive_user = User::find($id);
        $inactive_user->active_user = 0;
        $inactive_user->save();
        return back()->with('info', 'User Activated Successfully');
    }

    public function userToAdmin($id)
    {
        $mark_as_user = User::find($id);
        $mark_as_user->is_admin = 1;
        $mark_as_user->save();
        return back()->with('info', 'Make as Admin Successfully');
    }

    public function adminToUser($id)
    {
        $mark_as_admin = User::find($id);
        $mark_as_admin->is_admin = 0;
        $mark_as_admin->save();
        return back()->with('info', 'Make as User Successfully');
    }
    // delete user

    public function deleteUser($id){
        $delete_user = User::find($id);
        $delete_user->delete();
        return back()->with('danger','User Deleted Successfully');        
    }
}
