<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'created_at', 
        'posted_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
