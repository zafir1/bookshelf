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

    /**
     * Book has one BookDe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function BookDetail()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = book_id, localKey = id)
    	return $this->hasOne(BookDetail::class);
    }

    public function detailsCompleted()
    {
    	return (bool) $this->BookDetail()->get()->count();
    }

    /**
     * Book belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class);
    }

}
