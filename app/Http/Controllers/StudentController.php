<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class StudentController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        $students = $this->firebase->getAllStudents();
        $data = [];

        foreach ($students as $student) {
            $data[] = array_merge(['id' => $student->id()], $student->data());
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'course'=> 'required',
        ]);

        $student = $this->firebase->addStudent($request->only('name', 'email', 'course'));
        return response()->json(['id' => $student->id()]);
    }

    public function show($id)
    {
        $student = $this->firebase->getStudent($id);

        if (!$student->exists()) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($student->data());
    }

    public function update(Request $request, $id)
    {
        $this->firebase->updateStudent($id, $request->only('name', 'email', 'course'));
        return response()->json(['message' => 'Student updated']);
    }

    public function destroy($id)
    {
        $this->firebase->deleteStudent($id);
        return response()->json(['message' => 'Student deleted']);
    }
}
