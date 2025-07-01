@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add Student</h2>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @include('student.partials.form', ['student' => new \App\Models\Student])
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
