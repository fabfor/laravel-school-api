<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
  public function list(){

    return response()->json(Teacher::all());
  }
}
