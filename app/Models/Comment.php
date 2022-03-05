<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Comment extends Model
{
    use SearchableTrait;
    protected $searchable = [

        'columns' => [
            'comments.name' => 10,
            'comments.email' => 10,
            'comments.url' => 10,
            'comments.ip_address' => 10,
            'comments.comment' => 10,

        ],

    ];
    protected  $guarded  = [];

    public function  category(){

        return $this->belongsTo(Category::class);
    }
    public function  post(){

        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function status(){

        return $this->status ==1 ?"active":"Inactive";
    }
}
