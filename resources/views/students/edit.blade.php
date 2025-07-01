@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Student</h2>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf @method('PUT')
        @include('student.partials.form', ['student' => $student])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
