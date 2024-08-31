<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function user(){
        $data= User::where('role', 'user')->get();
        return view('admin.user.user', compact('data'));
    }
    public function user_add(){
        return view('admin.user.add_user');
    }
    
}
