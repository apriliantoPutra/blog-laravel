<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminReadingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home/index', ['judul' => 'Halaman Home']);
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/blog', function () {
    // $data = Blog::all(); cara mudah menampilkan semua function, tapi terdapat problem n +1

    // mengatasi problem n +1
    // $data = Blog::with(['user', 'category'])->latest()->get(); // hanya menggunakan function user dan category
    // return view('blog.blog', [
    //     'judul' => 'Halaman Blog',
    //     'datas' => $data
    // ]);

    // fitur search(lihat Model Blog):

    return view('blog.blog', [
        'judul' => 'Halaman Blog',
        'datas' => Blog::filter(request(['search', 'category', 'user']))->latest()->paginate(10)->withQueryString() // paginate 10, artinya hanya menampilkan 10 data
    ]);
});

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::find($id);
    // dd($blog);
    return view('blog.blogSingle', ['judul' => 'Blog single', 'blog' => $blog]);
});

Route::get('/users/{user:username}', function (User $user) {
    // cara default mengatasi n +1 (lihat model Blog):
    return view('blog.blog', [
        'judul' => count($user->blogs) . ' Artikel Ditulis Oleh ' . $user->name,
        'datas' => $user->blogs // blogs adalah nama function di model User
    ]);

    // mengatasi problem n +1(optional)
    // $blogs = $user->blogs->load('category', 'user');
    // return view('blog.blog', ['judul'=>count($blogs). ' Artikel Ditulis Oleh ' . $user->name,
    //             'datas'=> $blogs // blogs adalah variable penampung query category & user
    // ]);

});
Route::get('/categories/{category:slug}', function (Category $category) {
    // cara default mengatasi n +1 (lihat model Blog):
    return view('blog.blog', [
        'judul' => count($category->blogs) . ' Artikel Category: ' . $category->name,
        'datas' => $category->blogs // blogs adalah nama function di model Category
    ]);


    // mengatasi problem n +1(optional)
    // $blogs = $category->blogs->load('category', 'user');
    // return view('blog.blog', ['judul'=> count($blogs).' Artikel Category: ' . $category->name,
    //             'datas'=> $blogs // blogs adalah nama function di model Category
    // ]);

});

Route::get('/contact', function () {
    return view('contact/contact', ['judul' => 'Halaman Contact']);
});
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); // hanya bisa diakses jika belum login, defaultny jika belum login akan ditaruh di login(name('login))
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// author
Route::middleware(['auth', 'role:author'])->group(function () {
    Route::get(
        '/dashboard',
        function () {
            $user = Auth::user();
            return view('dashboard.index', ['judul' => 'Selamat Datang ' . $user->name]);
        }
    );
    Route::resource('/dashboard/blog', DashboardBlogController::class);
});

// Route::get('/dashboard', function(){
//     $user = Auth::user();
//     return view('dashboard.index', ['judul' => 'Selamat Datang ' . $user->name]);
// })->middleware('auth'); // hanya dapat diakses oleh pengguna yang sudah login


// Route::resource('/dashboard/blog', DashboardBlogController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin'); // lihat pada file bootstrap/app


// admin
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index']);
    Route::resource('admin/user-reading', AdminReadingController::class);
    Route::resource('admin/user-author', AdminAuthorController::class);
});


