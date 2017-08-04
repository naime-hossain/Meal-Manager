<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
     protected $fillable = [
        'name','deposit','meal_count','user_id','note'
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

    /**
     * Member belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class);
    }
}
