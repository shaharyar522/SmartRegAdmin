<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <style>
    /* General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #2C5F2D, #97BC62);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-container {
      background: #fff;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 600px;
      text-align: center;
      margin-top: 50px;
      /* Margin above the container */
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #2C5F2D;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
      /* Increased spacing between fields */
      text-align: left;
    }

    .form-group label {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      font-size: 14px;
      color: #777;
      transition: 0.3s;
      pointer-events: none;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 14px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      background: #fff;
      color: #333;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #2C5F2D;
      box-shadow: 0 0 8px rgba(44, 95, 45, 0.3);
    }

    .form-group input:focus+label,
    .form-group input:not(:placeholder-shown)+label,
    .form-group select:focus+label,
    .form-group select:not(:placeholder-shown)+label {
      top: 5px;
      left: 10px;
      font-size: 12px;
      color: #2C5F2D;
      background: #fff;
      padding: 0 5px;
    }

    .image-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 2px dashed #ddd;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      margin: 20px auto;
      background: #f9f9f9;
    }

    .image-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }

    .submit-btn {
      width: 100%;
      padding: 14px;
      background: #2C5F2D;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    .submit-btn:hover {
      background: #1E4020;
    }

    /* File Input Styling */
    .form-group input[type="file"] {
      display: none;
      /* Hide the default file input */
    }

    .file-upload-label {
      display: block;
      width: 100%;
      padding: 14px;
      border: 2px dashed #ddd;
      border-radius: 8px;
      text-align: center;
      color: #777;
      cursor: pointer;
      transition: border-color 0.3s, background 0.3s;
    }

    .file-upload-label:hover {
      border-color: #2C5F2D;
      background: #f9f9f9;
    }
  </style>
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
        <label for="state">State</label>
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