<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','lastname','birthdate','personal_id','salary','updated_at','created_at'];

    protected $table = 'employees';

    protected $timestamp = false;

}
