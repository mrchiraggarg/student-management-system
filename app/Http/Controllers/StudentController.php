<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{
    protected $database;
    protected $table = 'students';

    public function __construct()
    {
        $this->database = App::make('firebase.database');
    }

    public function index()
    {
        $students = $this->database->getReference($this->table)->getValue();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $postData = $request->only(['name', 'email', 'phone', 'course']);
        $this->database->getReference($this->table)->push($postData);
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = $this->database->getReference("$this->table/$id")->getValue();
        return view('student.edit', compact('student', 'id'));
    }

    public function update(Request $request, $id)
    {
        $postData = $request->only(['name', 'email', 'phone', 'course']);
        $this->database->getReference("$this->table/$id")->update($postData);
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $this->database->getReference("$this->table/$id")->remove();
        return redirect()->route('students.index');
    }
}
