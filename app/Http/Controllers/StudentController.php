<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    public function list(){

      return response()->json([
        'success' => true,
        'result' => Student::all()
      ]);
    }

    public function create(Request $request){

      $data = $request->all();

      $validator = Validator::make($request->all(), [
          'name' => 'required|min:2',
          'lastname' => 'required|min:2',
      ]);

      if ($validator->fails()) {
          return response()->json([
            "success" => false,
            "result" => $validator->messages()
          ]);
      }

      $new_student = new Student();

      $new_student->fill($data);

      try{
        $new_student->save();
      }
      catch(\Exception $e){
        return response()->json([
          'success' => false,
          'error' => $e->getMessage()
        ]);
      }

      return response()->json([
        'success' => true,
        'result' => $new_student
      ]);
    }

    /*
     * Cancella uno studente
     *
     */
    public function delete($id){
      $student = Student::find($id);

      $student->delete();

      return response()->json([
        'success' => true,
        'result' => $student
      ]);

    }

    public function edit(Request $request, $id){
      dd('ok');
      $student = Student::find($id);

      $student->fill($request->all());

      $student->save();

      return response()->json([
        'success' => true,
        'result' => $student
      ]);

    }
}
