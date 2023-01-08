<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $courses = Course::where('teacher_id', Auth::user()->teacher->id)->get();
        return view('backend.teacher.index',compact('courses'));
    }
  
}
