<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
class Client extends Model
{
    protected $fillable = ['name','age','city_id','status'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
