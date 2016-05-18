<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable = [
        'shop_name',
        'location',
        'zipcode_id',
        'premium_shop',
        'description',
        'added',
        'deleted',
        'amount',
        'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function zipcode()
    {
        return $this->belongsTo('App\Zipcode');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}