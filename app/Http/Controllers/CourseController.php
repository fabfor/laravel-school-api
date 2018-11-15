<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;


class CourseController extends Controller
{
  public function list(){

    return response()->json(Course::all());
  }

  
  public function detail(Request $request, $id){

    if ($request->insegnanti == true){
      return response()->json(Course::with('teachers')->find($id));
    }
    elseif ($request->studenti == true) {
      return response()->json(Course::with('students')->find($id));
    }
    else{
      return response()->json(Course::find($id));
    }
  }
}
