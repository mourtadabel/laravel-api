<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::select('name', 'description')->get();
        return response()->json($fields);
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $field = new Field();
        $field->name = $request->name;
        $field->description = $request->description;
        $field->save();

        return response()->json(['message' => 'Field successfully added'], 201);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $field = Field::find($id);

        if (!$field) {
            return response()->json(['error' => 'Field not found'], 404);
        }

        $field->name = $request->name;
        $field->description = $request->description;
        $field->save();

        return response()->json(['message' => 'Field successfully updated'], 200);
    }

    public function delete($id)
    {
        $field = Field::find($id);

        if (!$field) {
            return response()->json(['error' => 'Field not found'], 404);
        }

        $field->delete();

        return response()->json(['message' => 'Field successfully deleted'], 200);
    }
}
