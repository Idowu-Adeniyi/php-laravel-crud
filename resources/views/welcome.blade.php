<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
</head>
<body>
  
    <h1>All Students</h1>
    @foreach ($students as $student)
    {{ $student -> fname}}
    <br>
    @endforeach

    <h1>All Courses</h1>
    @foreach ($courses as $course)
    {{ $course -> WebDevelopment}}
    <br>
    @endforeach
</body>
</html>