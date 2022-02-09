<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['user_id', 'title', 'category_id', 'slug', 'image','excerpt', 'body'];
    protected $guarded = ['id'];
    // value $fillable adalah untuk mengizinkan field yang boleh di isi
    // value $guarded adalah untuk melarang filed yang tidak boleh di isi (kebalikan $fillable)
    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class); // cardinalitas one to one
    }

    public function user()
    {
        return $this->belongsTo(User::class); // tambahkan di akhir ( , 'user_id' ) jika ingin mengganti nama method
    }

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%');
        //      //   ->orWhere('body', 'like', '%' . $filters['search'] . '%'); //jika banyak 
        //  }

        // yang d bawah fungsinya sama dengan yang di atas

         $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
         });

         $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
         });

         $query->when($filters['author'] ?? false, fn ($query, $author) => 
           $query->whereHas('user', fn ($query) =>
                $query->where('username', $author)
           )
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}


