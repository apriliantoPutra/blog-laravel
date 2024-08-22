<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // // membuat manual
        // $putra = User::create([
        //     'name' => 'Muhammad Aprilianto Putra',
        //     'username'=> 'Putra',
        //     'email'=> 'apriliantoputra@gmail.com',
        //     'email_verified_at'=> now(),
        //     'password'=> Hash::make('password'),
        //     'remember_token'=> Str::random(10)
        // ]);
        // Category::create([
        //     'name'=> 'Web design',
        //     'slug'=> 'web-design'
        // ]);
        // Blog::create([
        //     'judul_blog'=> 'Judul Artikel 1',
        //     'user_id'=> 1,
        //     'category_id'=> 1,
        //     'penulis_blog'=> 'Boy Wiliam',
        //     'isi_blog'=> 'Pada tahun 2024, teknologi AI mengalami
        //      perkembangan pesat. Dari mobil otonom hingga asisten
        //      virtual yang lebih canggih, AI semakin meresap dalam
        //      kehidupan sehari-hari. Salah satu inovasi terbaru
        //      adalah penggunaan AI dalam bidang kesehatan, di mana
        //      algoritma machine learning digunakan untuk mendeteksi
        //      penyakit lebih awal dengan akurasi yang tinggi.
        //      Selain itu, AI juga mulai digunakan untuk meningkatkan
        //      efisiensi di sektor pertanian, membantu petani mengoptimalkan
        //      hasil panen dan mengurangi penggunaan pestisida. Meski banyak
        //      manfaat yang ditawarkan, penggunaan AI juga menimbulkan
        //      berbagai tantangan, terutama terkait privasi dan etika.
        //      Oleh karena itu, penting bagi kita untuk terus memantau
        //      perkembangan teknologi ini dan memastikan bahwa penerapannya
        //      tetap dalam batas yang aman dan bermanfaat bagi masyarakat'
        // ]);

        // buat 3 data pada model Blog, User, Factory
        // Blog::factory(100)->recycle([
        //     User::factory(5)->create(),
        //     $putra,
        //     Category::factory(3)->create()
        // ])->create();

        // memanggil seeder pada file terpisah:
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Blog::factory(100)->recycle([
                User::all(),
                Category::all()
            ])->create();
    }
}
