<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="css/form.css">
</head>

<body>

  <div class="form-container">
    <h1>Student Registration</h1>

    <!-- Image Preview -->
    <div class="image-preview">
      <img id="imagePreview" src="" alt="Image Preview">
      <span id="placeholderText">No Image Selected</span>
    </div>
    <div>

    </div>

    <form>
      <div class="form-group">
        <input type="text" id="student_name" name="student_name" required placeholder=" ">
        <label for="student_name">Student Name</label>
      </div>

      <div class="form-group">
        <input type="text" id="father_name" name="father_name" required placeholder=" ">
        <label for="father_name">Father's Name</label>
      </div>

      <div class="form-group">
        <input type="text" id="father_cnic" name="father_cnic" required placeholder=" ">
        <label for="father_cnic">Father's CNIC</label>
      </div>

      <div class="form-group">
        <input type="text" id="student_cnic" name="student_cnic" required placeholder=" ">
        <label for="student_cnic">Student CNIC</label>
      </div>

      <div class="form-group">
        <input type="email" id="email" name="email" required placeholder=" ">
        <label for="email">Email</label>
      </div>

      <div class="form-group">
        <input type="tel" id="phone" name="phone" required placeholder=" ">
        <label for="phone">Phone Number</label>
      </div>

     <!-- here is pate a image file opiotn same as phone number input  -->

     
      <div class="form-group">
        <input type="file" id="image" name="image" accept="image/*">
        <label for="image">Choose Image</label>
      </div>


      <div class="form-group">
        <select id="country" name="country" required>
          <option value=""></option>
          <option value="USA">USA</option>
          <option value="Canada">Canada</option>
          <option value="Pakistan">Pakistan</option>
        </select>
        <label for="country">Country</label>
      </div>

      <div class="form-group">
        <select id="state" name="state" required>
          <option value=""></option>
          <option value="California">California</option>
          <option value="Texas">Texas</option>
          <option value="Punjab">Punjab</option>
        </select>
        <label for="state">State </label>
      </div>

      <div class="form-group">
        <select id="city" name="city" required>
          <option value=""></option>
          <option value="New York">New York</option>
          <option value="Los Angeles">Los Angeles</option>
          <option value="Lahore">Lahore</option>
        </select>
        <label for="city">City</label>
      </div>



      <button type="submit" class="submit-btn">Register</button>
    </form>
  </div>


</body>

</html>