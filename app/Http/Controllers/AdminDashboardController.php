<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        // hanya menampilkan blog users role author
        $data = Blog::whereIn('user_id', function($query) {
            $query->select('id')->from('users')->where('role', 'author');
        })->latest()->paginate(10);

        
        // total
        $totalBlog = Blog::count();
        $totalUser = User::where('role','user')->count();
        $totalAuthor = User::where('role','author')->count();
        return view('admin.index', compact('data', 'totalBlog', 'totalUser', 'totalAuthor' ));
    }
}
