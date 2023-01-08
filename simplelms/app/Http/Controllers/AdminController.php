<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Learner;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('backend.admin.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'type' => $request->type,    
        ]);

        // if ($request->type === 'teacher') {
        //     Teacher::updateOrCreate(
        //         ['user_id'   =>  $id],
        //         ['user_id'   =>  $id]
        //     );
        // } else if ($request->type != 'teacher') {
        //     Teacher::where('user_id', $id)->delete();
        // }
        // if ($request->type === 'learnern') {
        //     Learner::updateOrCreate(
        //         ['user_id'   =>  $id],
        //         ['user_id'   =>  $id]
        //     );
        // } else if ($request->type != 'learnern') {
        //     Learner::where('user_id', $id)->delete();
        // }
        return redirect()->route('admindashboard');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return view('backend.admin.index');
    }

    // Teacher Methods
    public function getTeacher()
    {
        // $teachers = User::where('type','teacher')->get();
        $teachers = Teacher::with('user')->get();

        return view('backend.admin.teacher.index', compact('teachers'));
    }
    public function addTeacher(){
        return view('backend.admin.add_teacher');
    }
    public function storeTeacher(Request $request){
        DB::beginTransaction();
        try {
            $userid =  DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'teacher',
    
            ]);
            Teacher::create([
                'user_id' => $userid,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }
       
        return redirect()->route('getteacher');
    }

    // Course category 
    public function courseCatIndex()
    {
        $courseCats = CourseCategory::all();
        return view('backend.admin.course.corse_cat', compact('courseCats'));
    }
    public function courseCatAdd()
    {
        return view('backend.admin.course.corse_cat_add');
    }
    public function courseCatStore(Request $request)
    {

        if (!empty($request->file('cat_img'))) {
            $cat_img = $request->file('cat_img');
            $make_name = time() . '.' . $cat_img->getClientOriginalExtension();
            $cat_img->move(public_path('images/cat-image'), $make_name);
            $uploadPath = 'images/cat-image/' . $make_name;
            CourseCategory::create([
                'name' => $request->cat_name,
                'image' => $uploadPath,
            ]);
        }
        CourseCategory::create([
            'name' => $request->cat_name,
        ]);

        return redirect()->route('getcoursecat');
    }
    public function EditCat($id)
    {
        $courCat = CourseCategory::find($id);
        return view('backend.admin.course.corse_cat_edit', compact('courCat'));
    }
    public function updateCat(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('cat_img')) {

            //  unlink($old_img);
            $cat_img = $request->file('cat_img');

            $make_name = time() . '.' . $cat_img->getClientOriginalExtension();
            $cat_img->move(public_path('images/cat-image'), $make_name);
            $uploadPath = 'images/cat-image/' . $make_name;

            CourseCategory::find($id)->update([
                'name' => $request->cat_name,
                'image' => $uploadPath,
            ]);
        }
        CourseCategory::find($id)->update([
            'name' => $request->cat_name,
        ]);
        return redirect()->route('getcoursecat');
    }
    public function deleteCat($id)
    {
        CourseCategory::find($id)->delete();
        return redirect()->back();
    }

    // courses
    public function getCourse()
    {
        $courses = Course::all();
        return view('backend.admin.course.index', compact('courses'));
    }
    public function AddCourse()
    {
        $teachers = Teacher::with('user')->get();
        $categories = CourseCategory::all();

        return view('backend.admin.course.add_course',compact('teachers','categories'));
    }
    public function StoreCourse(Request $request)
    {
     
        
            $course_img = $request->file('course_img');
            $make_name = time() . '.' . $course_img->getClientOriginalExtension();
            $course_img->move(public_path('images/cat-image'), $make_name);
            $uploadPath = 'images/cat-image/' . $make_name;
            //thumbnail
            $course_thumb = $request->file('course_thumb');
            $make_name = time() . '.' . $course_thumb->getClientOriginalExtension();
            $course_thumb->move(public_path('images/cat-image'), $make_name);
            $uploadPathcourse_thumb = 'images/cat-image/' . $make_name;
            Course::create([
                'cat_id' => $request->cat_id,
                'teacher_id' => $request->teacher_id,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $uploadPath,
                'thumbnail' => $uploadPathcourse_thumb,
                'status' => 1,
            ]);
        return redirect()->route('getcourse');
    }
    public function editCourse($id)
    {
        $course = Course::find($id);
         $teach = Teacher::with('user')->where('id',$course->teacher_id)->first();
         $teachers = Teacher::with('user')->get();
         $categories = CourseCategory::all();
       
        $cate = CourseCategory::where('id',$course->cat_id)->first();
        return view('backend.admin.course.edit_course', compact('categories','teachers','course','teach','cate'));
    }
    public function updateCourse(Request $request,$id)
    {   
        $c_image = $request->c_image;
        $c_thumb = $request->c_thumb;
        if (!empty($request->file('course_img'))) {
            $course_img = $request->file('course_img');
            $make_name = time() . '.' . $course_img->getClientOriginalExtension();
            $course_img->move(public_path('images/cat-image'), $make_name);
            $uploadPath = 'images/cat-image/' . $make_name;
            
            Course::find($id)->update([
                'cat_id' => $request->cat_id,
                'teacher_id' => $request->teacher_id,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $uploadPath,
                'thumbnail' => $c_thumb,
                'status' => 1,
            ]);
        }
        if (!empty($request->file('course_thumb'))) {
            $course_thumb = $request->file('course_thumb');
            $make_name = time() . '.' . $course_thumb->getClientOriginalExtension();
            $course_thumb->move(public_path('images/cat-image'), $make_name);
            $uploadPathcourse_thumb = 'images/cat-image/' . $make_name;
            Course::find($id)->update([
                'cat_id' => $request->cat_id,
                'teacher_id' => $request->teacher_id,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $c_image,
                'thumbnail' => $uploadPathcourse_thumb,
                'status' => 1,
            ]);
        }

        Course::find($id)->update([
            'cat_id' => $request->cat_id,
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
          
        ]);
        return redirect()->route('getcourse');
    }
    public function deleteCourse($id)
    {
        Course::find($id)->delete();
        return redirect()->route('getcourse');
    }
}
