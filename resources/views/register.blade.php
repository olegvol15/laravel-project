@extends ('templates.main');

@section('content')
  <h1>Register</h1>

  @include ('templates.errors')

  <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <p>Roll no. : <input type="text" name="roll_no" value="{{ old('roll_no') }}"></p>

      <p>Student name : 
          <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
          <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
      </p>

      <p>Father's name : <input type="text" name="fathers_name" value="{{ old('fathers_name') }}"></p>
      <p>Date of birth :
          <input type="text" name="dob_day" placeholder="Day" size="2">
          <input type="text" name="dob_month" placeholder="Month" size="2">
          <input type="text" name="dob_year" placeholder="Year" size="4">
          (DD-MM-YYYY)
      </p>

      <p>Mobile no. :
          +38 - <input type="text" name="mobile" value="{{ old('mobile') }}">
      </p>
      <p>Email id : <input type="email" name="email" value="{{ old('email') }}"></p>
      <p>Password : <input type="password" name="password"></p>

      <p>Gender :
          <input type="radio" name="gender" value="Male"> Male
          <input type="radio" name="gender" value="Female"> Female
      </p>

      <p>Department :
          <input type="checkbox" name="department[]" value="CSE"> CSE
          <input type="checkbox" name="department[]" value="IT"> IT
          <input type="checkbox" name="department[]" value="ECE"> ECE
          <input type="checkbox" name="department[]" value="Civil"> Civil
          <input type="checkbox" name="department[]" value="Mech"> Mech
      </p>

      <p>Course :
          <select name="course">
              <option value="">Select Current Course's</option>
              <option value="B.Tech">B.Tech</option>
              <option value="M.Tech">M.Tech</option>
              <option value="BCA">BCA</option>
              <option value="MCA">MCA</option>
          </select>
      </p>

      <p>Student photo : <input type="file" name="photo"></p>
      <p>City : <input type="text" name="city" value="{{ old('city') }}"></p>
      <p>Address : <textarea name="address">{{ old('address') }}</textarea></p>
      <p><button type="submit">Register</button></p>
  </form>
  @endsection
    