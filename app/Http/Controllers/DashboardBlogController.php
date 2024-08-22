<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.blog.index',[
            'datas'=> Blog::where('user_id', Auth::user()->id )->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.create', [
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'judul_blog'=> 'required|max:255',
            'category_id'=>'required',
            'isi_blog'=> 'required'
        ]);

        $validatedData['user_id']= Auth::user()->id;

        Blog::create($validatedData);
        return redirect('/dashboard/blog')->with('success', 'New blog has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('dashboard.blog.show', [
            'blog'=> $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', [
            'blog'=>$blog,
            'categories'=> Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
       // Validasi data yang diterima
    $validatedData = $request->validate([
        'judul_blog' => 'required|max:255',
        'category_id' => 'required|exists:categories,id', // Pastikan category_id valid
        'isi_blog' => 'required'
    ]);

    // Set user_id secara otomatis
    $validatedData['user_id'] = Auth::user()->id;

    // Blog::where('id', $blog->id)
    //         ->update($validatedData);

    // Gunakan metode update pada instance model, lebih efisien dari atas
    $blog->update($validatedData);

    // Redirect dengan pesan sukses
    return redirect('/dashboard/blog')->with('success', 'Blog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);
        return redirect('/dashboard/blog')->with('success', 'The blog has been delete!');

    }
}
