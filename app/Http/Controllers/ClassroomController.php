<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function students()
    {
        $students = Student::all();
        return view('students',['students'=>$students]);
    }

    public function classrooms()
    {
        $classrooms = Classroom::all();
        return view('classroom',['classrooms'=>$classrooms]);
    }
}
