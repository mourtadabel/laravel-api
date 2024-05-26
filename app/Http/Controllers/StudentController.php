<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Field; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('field')->get();

        $data = [
            'status' => 200,
            'students' => $students->map(function ($student) {
                $fieldName = $student->field ? $student->field->name : null; 
                return [
                    'name' => $student->name,
                    'email' => $student->email,
                    'phone' => $student->phone,
                    'field' => $fieldName 
                ];
            })
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'field' => 'required|string',
        ]);

        $field = Field::where('name', $request->field)->first();

        if (!$field) {
            return response()->json(['error' => 'Field not found'], 404);
        }

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->field_id = $field->id; 
        $student->save();

        return response()->json(['message' => 'Data successfully added'], 201);
    }

    public function edit($id, Request $request)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'field' => 'required|string',
        ]);

        $field = Field::where('name', $request->field)->first();

        if (!$field) {
            return response()->json(['error' => 'field not found'], 404);
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->field_id = $field->id;
        $student->save();

        return response()->json(['message' => 'Student successfully updated'], 200);
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student successfully deleted'], 200);
    }
}
