@extends('layouts.app')

@section('content')
    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
        <div class="mb-3"><label>Course</label><input type="text" name="course" class="form-control"></div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
