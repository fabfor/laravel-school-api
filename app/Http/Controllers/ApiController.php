<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;

class ApiController extends Controller
{
    public function index(){
      $courses = Course::all();

      return response()->json($courses)->withHeaders([
        'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function studentList(){
      $students = Student::all();

      return response()->json($students)->withHeaders([
        'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function detail($id){
      $course = Course::with('students')->find($id);

      return response()->json($course);
    }

    public function create(Request $request){
      $data = $request->all();

      $course = new Course();
      $course->credits = $data['credits'];
      $course->name = $data['name'];
      $course->code = $data['code'];

      $course->save();

      return response()->json('ok')->withHeaders([
        'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function studentsIndex(){
      return response()->json(Student::with('courses')->get())->withHeaders([
        'Access-Control-Allow-Origin' => '*'
        ]);
    }
}
