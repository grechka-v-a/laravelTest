<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id',
    ];

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}