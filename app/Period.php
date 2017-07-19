<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name','status','user_id'];
    /**
     * Period has many Bazars.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bazars()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = period_id, localKey = id)
    	return $this->hasMany("App\Bazar");
    }

    /**
     * Period belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class);
    }
}
