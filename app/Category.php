<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'parent_id', 'id');
    }
}
