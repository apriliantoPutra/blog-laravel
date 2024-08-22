<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function user(){
        return view('admin.user.user');
    }
    public function author(){
        return view('admin.user.author');
    }
}
