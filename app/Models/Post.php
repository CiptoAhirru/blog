<?php

namespace App\Models;
use Illuminate\Support\Str;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['judul', 'slug', 'excerpt', 'body'];

    //penggunaan eager loader
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('judul', 'like', '%'.$filters['search'].'%')
        //           ->orWhere('body', 'like', '%'.$filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%'.$search.'%')
                         ->orWhere('body', 'like', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('user', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
