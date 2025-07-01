@extends('layout')

@section('content')
<h2>Add Student</h2>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Course: <input type="text" name="course" required></label><br>
    <button type="submit">Add</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
@endsection
