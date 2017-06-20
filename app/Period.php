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
    protected $fillable = ['name','status'];
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
}
