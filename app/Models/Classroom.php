<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  public $timestamps = true;
  public $table = 'classrooms';

  protected $fillable = ['course_name','room_name'];
  public function students()
  {
      return $this->hasMany(Student::class);
  }
}
