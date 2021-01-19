<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table="posts";
    protected $primaryKey = "id";
    protected $fillable=["title","user_id","url","description","excerpt","image","status","format_id","allow_comments"];

    public function category()
    {
        return $this->belongsToMany(
            Category::class,
           PostHasCategories::class,
            'post_id',
            'category_id'
        );
    }
    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            PostHasTags::class,
            'post_id',
            'tag_id'
        );
    }
    public function Format(){
        return $this->belongsTo(Format::class,"format_id","id");
    }
}
