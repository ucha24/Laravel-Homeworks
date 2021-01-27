<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public $timestamps = true;
  public $table = 'students';

  protected $fillable = ['name', 'lastname', 'address', 'classroom_id'];

  public function classroom()
  {
      return $this->belongsTo(Classroom::class);
  }
}
