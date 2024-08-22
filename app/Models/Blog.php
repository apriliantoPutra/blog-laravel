<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','judul_blog', 'isi_blog'];

    // cara otomatis mengatasi problem n +1:
    protected $with = ['user', 'category']; // user dan category yaitu function yg digunakan

    // membuat relation dgn model User (1 Blog dimiliki banyak User)
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    // fitur search
    public function scopeFilter(Builder $query, array $filters):void
    {
        $query->when(
            $filters['search'] ?? false,
           fn ($query, $search) =>
            $query->where('judul_blog', 'like', '%' . request('search'). '%')

        );
        $query->when(
            $filters['category'] ?? false,
           fn ($query, $category) =>
            $query->whereHas('category', fn($query)=> $query->where('slug', $category))
        );
        $query->when(
            $filters['user'] ?? false,
           fn ($query, $user) =>
            $query->whereHas('user', fn($query)=> $query->where('username', $user))
        );

    }
    

}
