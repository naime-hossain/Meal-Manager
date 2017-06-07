<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
     protected $fillable = [
        'name','deposit'
    ];


      /**
     * User has many bazar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bazars()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasMany('App\Bazar');
    }
}
