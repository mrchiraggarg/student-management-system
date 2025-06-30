<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class StudentController extends Controller
{
    protected $database;

    public function __construct(FirebaseService $firebase)
    {
        $this->database = $firebase->getDatabase();
    }

    // CREATE student
    public function store(Request $request)
    {
        $postData = $request->only(['name', 'email', 'course']);
        $newStudent = $this->database->getReference('students')->push($postData);

        return response()->json(['message' => 'Student created', 'id' => $newStudent->getKey()]);
    }

    // READ students
    public function index()
    {
        $students = $this->database->getReference('students')->getValue();
        return response()->json($students);
    }

    // UPDATE student
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email', 'course']);
        $this->database->getReference("students/{$id}")->update($data);

        return response()->json(['message' => 'Student updated']);
    }

    // DELETE student
    public function destroy($id)
    {
        $this->database->getReference("students/{$id}")->remove();
        return response()->json(['message' => 'Student deleted']);
    }
}
