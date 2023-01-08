<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistartion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function Enrol($id){
        DB::beginTransaction();
        try{
            $user_id = Auth::user()->id;
            User::find($user_id)->update([
                'type' => 'learner'
            ]);
            DB::table('learners')->insertGetId([
                'user_id' => $user_id
            ]);
    
            CourseRegistartion::create([
                'learner_id' => $user_id,
                'course_id' => $id,
            ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        };
        return redirect()->route('learnerdashboard');
     
    }
}
