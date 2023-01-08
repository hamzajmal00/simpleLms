<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        $courses = Course::all();
        return view('frontend.home',compact('courses'));
    }
    public function logout(){
          Auth::logout();
          return redirect()->route('home');
    }
}
