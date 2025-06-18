@extends ('templates.main');

@section ('content')

<h1>Confirmation</h1>

<h2>Registration Successful!</h2>

    <p><strong>Roll No:</strong> {{ $student['roll_no'] }}</p>
    <p><strong>Name:</strong> {{ $student['first_name'] }} {{ $student['last_name'] }}</p>
    <p><strong>Father's Name:</strong> {{ $student['fathers_name'] }}</p>
    <p><strong>DOB:</strong> {{ $student['dob_day'] }}-{{ $student['dob_month'] }}-{{ $student['dob_year'] }}</p>
    <p><strong>Mobile:</strong> {{ $student['mobile'] }}</p>
    <p><strong>Email:</strong> {{ $student['email'] }}</p>
    <p><strong>Gender:</strong> {{ $student['gender'] }}</p>
    <p><strong>Departments:</strong> {{ implode(', ', $student['department']) }}</p>
    <p><strong>Course:</strong> {{ $student['course'] }}</p>
    <p><strong>City:</strong> {{ $student['city'] }}</p>
    <p><strong>Address:</strong> {{ $student['address'] }}</p>

    @if(isset($student['photo']))
        <p><strong>Photo:</strong></p>
        <img src="{{ asset('storage/' . $student['photo']) }}" width="150" />
    @endif

@endsection