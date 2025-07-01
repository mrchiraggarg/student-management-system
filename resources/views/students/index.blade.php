@extends('layout')

@section('content')
<h2>All Students</h2>
<a href="{{ route('students.create') }}">+ Add Student</a>
<table border="1" cellpadding="8">
    <thead>
        <tr><th>Name</th><th>Email</th><th>Course</th><th>Actions</th></tr>
    </thead>
    <tbody>
    @forelse($students as $id => $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>{{ $student['course'] }}</td>
            <td>
                <a href="{{ route('students.edit', $id) }}">Edit</a>
                <form action="{{ route('students.destroy', $id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete student?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No students found.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
