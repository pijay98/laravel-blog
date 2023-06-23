<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'content', 'status', 'excerpt', 'user_id', 'category_id'];

    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}