<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="{{ $student->fname }}" required>
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="{{ $student->lname }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $student->email }}" required>
    </div>
    <div>
        <label for="courses">Courses:</label>
        @foreach($courses as $course)
            <div>
                <input type="checkbox" id="course{{ $course->id }}" name="courses[]" value="{{ $course->id }}"
                    {{ $student->courses->contains($course->id) ? 'checked' : '' }}>
                <label for="course{{ $course->id }}">{{ $course->name }}</label>
            </div>
        @endforeach
    </div>
    <button type="submit">Update</button>
</form>
