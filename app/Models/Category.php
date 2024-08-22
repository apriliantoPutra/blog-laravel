<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;
    protected $fillable= ['name', 'color'];
    public function sluggable(): array
    {
        return [
            'slug' => [ // nama kolom
                'source' => 'name'
            ]
        ];
    }
    public function blogs(): HasMany{
        return $this->hasMany(Blog::class, 'category_id'); // secara default kedua relation harus sama(id != user_id), jd definisikan nama relationnya yaitu user_id
    }
}
