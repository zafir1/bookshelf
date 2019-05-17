<?php

namespace thebookshelf;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['user_id','field'];
}
