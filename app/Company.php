<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = ['name','code','address','city','country'];

    protected $table = 'companies';

}
