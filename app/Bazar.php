<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
     'period_id',
	'member_id',
	'amount',
	'date',
	'note'
    ];

   /**
    	 * Bazar belongs to User.
    	 *
    	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    	 */
    	public function member()
    	{
    		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    		return $this->belongsTo('App\Member');
    	}
    /**
    	 * Bazar belongs to period.
    	 *
    	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    	 */
    	public function Period()
    	{
    		// belongsTo(RelatedModel, foreignKey = period_id, keyOnRelatedModel = id)
    		return $this->belongsTo('App\Period');
    	}
}

