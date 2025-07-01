@extends('layout')

@section('content')
<h2>Edit Student</h2>
<form action="{{ route('students.update', $id) }}" method="POST">
    @csrf @method('PUT')
    <label>Name: <input type="text" name="name" value="{{ $student['name'] }}" required></label><br>
    <label>Email: <input type="email" name="email" value="{{ $student['email'] }}" required></label><br>
    <label>Course: <input type="text" name="course" value="{{ $student['course'] }}" required></label><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
@endsection
