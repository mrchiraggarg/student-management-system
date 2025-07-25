@extends('layouts.app')

@section('content')
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $student['name'] }}" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $student['email'] }}" required></div>
        <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control" value="{{ $student['phone'] }}"></div>
        <div class="mb-3"><label>Course</label><input type="text" name="course" class="form-control" value="{{ $student['course'] }}"></div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
