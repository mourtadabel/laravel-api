<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Student;


class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::select('name', 'description')->get();
        return response()->json($clubs);
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $club = new Club();
        $club->name = $request->name;
        $club->description = $request->description;
        $club->save();

        return response()->json(['message' => 'Club successfully added'], 201);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $club = Club::find($id);

        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $club->name = $request->name;
        $club->description = $request->description;
        $club->save();

        return response()->json(['message' => 'Club successfully updated'], 200);
    }

    public function delete($id)
    {
        $club = Club::find($id);

        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $club->delete();

        return response()->json(['message' => 'Club successfully deleted'], 200);
    }

    public function addStudent(Request $request, $clubId)
    {
        $request->validate([
            'student_id' => 'required|integer'
        ]);

        $club = Club::find($clubId);
        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $studentId = $request->input('student_id');
        $student = Student::find($studentId);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $club->students()->attach($studentId);

        return response()->json(['message' => 'Student added to club'], 200);
    }

    public function removeStudent($clubId, $studentId)
    {
        $club = Club::find($clubId);
        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $student = $club->students()->find($studentId);
        if (!$student) {
            return response()->json(['error' => 'Student not found in club'], 404);
        }

        $club->students()->detach($studentId);

        return response()->json(['message' => 'Student removed from club'], 200);
    }

    public function listStudents($clubId)
    {
        $club = Club::find($clubId);
        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $students = $club->students()->select('students.id', 'students.name')->get();

        return response()->json($students, 200);
    }

}
