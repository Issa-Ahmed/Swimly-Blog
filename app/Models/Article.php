<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id','tag_id','user_id','title','image','post'];

    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
