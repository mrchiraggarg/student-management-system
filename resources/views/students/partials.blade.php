<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
</div>

<div class="mb-3">
    <label>Course</label>
    <input type="text" name="course" class="form-control" value="{{ old('course', $student->course) }}">
</div>
