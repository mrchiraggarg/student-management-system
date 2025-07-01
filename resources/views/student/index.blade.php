@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Student List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    @if($students)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $id => $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student['name'] ?? '-' }}</td>
                <td>{{ $student['email'] ?? '-' }}</td>
                <td>{{ $student['phone'] ?? '-' }}</td>
                <td>{{ $student['course'] ?? '-' }}</td>
                <td>
                    <a href="{{ route('students.edit', $id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No students found.</p>
    @endif
@endsection
