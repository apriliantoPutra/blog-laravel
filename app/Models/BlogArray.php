<?php
namespace App\Models;
use Illuminate\Support\Arr;

class Blog{
    public static function data(){
        return [
            ['id'=>1,
            'judul-blog'=> 'Judul Artikel 1',
            'penulis-blog'=> 'Boy Wiliam',
            'isi-blog'=> 'elit. Cumque perspiciatis facere atque ratione eum,
                debitis ipsam fugiat omnis minima numquam perferendis
                ea nisi quisquam dolorum, consectetur architecto.
                Temporibus libero accusantium numquam',
        ],
        [
            'id'=>2,
            'judul-blog'=> 'Judul Artikel 2',
            'penulis-blog'=> 'Sonny Picture',
            'isi-blog'=> 'elit. Cumque perspiciatis facere atque ratione eum,
                debitis ipsam fugiat omnis minima numquam perferendis
                ea nisi quisquam dolorum, consectetur architecto.
                Temporibus libero accusantium numquam'
        ]
        ];
    }

    public static function find($id){
        // return Arr::first(static::data(), function($blog) use ($id){
        //     return $blog['id'] == $id;
        // });

        $blog = Arr::first(static::data(), fn ($blog)=> $blog['id'] == $id); // fn untuk mengambil variable global id
        if(!$blog){
            abort(404);
        }
        return $blog;
    }
}
?>
