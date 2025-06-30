<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        return Student::all();
    }

    public function store(Request $request) {
        $data = $request->only(['name', 'email', 'course']);
        return Student::create($data);
    }

    public function show($id) {
        return Student::find($id);
    }

    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->only(['name', 'email', 'course']));
        return $student;
    }

    public function destroy($id) {
        return Student::destroy($id);
    }
}
