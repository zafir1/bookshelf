<?php

namespace thebookshelf;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','user_id','price','author','publication','edition','sold'];
}
