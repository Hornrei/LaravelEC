<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
   protected $guarded = [
     'id'
   ];

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }
}