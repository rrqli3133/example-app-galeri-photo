<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //REGISTRASI FIELD TABEL POSTS
    protected $fillable=[
        'id',
        'title',
        'category',
        'description',
        'user_id',
        'slug'
    ];
    
    // membuat setting attribute title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }
}
