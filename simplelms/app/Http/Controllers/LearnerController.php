<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistartion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnerController extends Controller
{
    //
    public function index()
    {
        $auth_id = Auth::user()->id;
        $curse_reg_id = CourseRegistartion::where('learner_id',$auth_id)->first();
        $courses = Course::where('id',$curse_reg_id->course_id)->get();
        return view('backend.learner.index',compact('courses'));
    }
}
