<?php

namespace thebookshelf;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['book_id','description'];
}
