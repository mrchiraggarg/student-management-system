<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>
    <h1>Student List</h1>
    <ul>
        @foreach($students as $key => $student)
            <li>{{ $student['name'] }} ({{ $student['email'] }})</li>
        @endforeach
    </ul>
</body>
</html>
