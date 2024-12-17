<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="courses">Courses:</label>
        @foreach($courses as $course)
            <div>
                <input type="checkbox" id="course{{ $course->id }}" name="courses[]" value="{{ $course->id }}">
                <label for="course{{ $course->id }}">{{ $course->name }}</label>
            </div>
        @endforeach
    </div>
    <button type="submit">Save</button>
</form>
