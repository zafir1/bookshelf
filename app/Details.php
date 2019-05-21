<?php

namespace thebookshelf;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $guarded = [];

    /**
     * Details has one Location.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getLocation()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = details_id, localKey = id)
    	return $this->hasOne(Location::class,'id','location');
    }

    /**
     * Details has one College.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getCollege()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = details_id, localKey = id)
    	return $this->hasOne(College::class,'id','college');
    }
}
