<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="styles.css">
  <style>
/* General Styles */
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #ff9a9e, #fad0c4);
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  color: #333;
}

.form-container {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 800px;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
  font-size: 32px;
  font-weight: 700;
}

/* Form Row Styling */
.form-row {
  display: flex;
  gap: 30px; /* Consistent spacing between fields */
  margin-bottom: 25px; /* Spacing between rows */
}

.form-group {
  flex: 1;
  position: relative;
}

.form-group input,
.form-group select {
  width: 100%;
  padding: 15px;
  border: 2px solid #ddd;
  border-radius: 10px;
  font-size: 16px;
  color: #333;
  background: #fff;
  transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
  border-color: #ff6f61;
  box-shadow: 0 0 10px rgba(255, 111, 97, 0.3);
  outline: none;
}

.form-group label {
  position: absolute;
  top: 15px;
  left: 15px;
  font-size: 16px;
  color: #777;
  background: #fff;
  padding: 0 5px;
  transition: all 0.3s ease;
  pointer-events: none;
}

.form-group input:focus + label,
.form-group input:not(:placeholder-shown) + label,
.form-group select:focus + label,
.form-group select:not(:placeholder-shown) + label {
  top: -10px;
  left: 10px;
  font-size: 12px;
  color: #ff6f61;
}

/* Hover Effects */
.form-group input:hover,
.form-group select:hover {
  border-color: #ff6f61;
}

/* Submit Button Styling */
.submit-btn {
  width: 100%;
  padding: 15px;
  background: #ff6f61;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 18px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.submit-btn:hover {
  background: #ff3b2f;
}
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Student Registration Form</h1>
    <form>
      <!-- Student Details -->
      <div class="form-row">
        <div class="form-group">
          <input type="text" id="student_name" name="student_name" required>
          <label for="student_name">Student Name</label>
        </div>
        <div class="form-group">
          <input type="text" id="father_name" name="father_name" required>
          <label for="father_name">Father's Name</label>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="father_cnic" name="father_cnic" required>
          <label for="father_cnic">Father's CNIC</label>
        </div>
        <div class="form-group">
          <input type="text" id="student_cnic" name="student_cnic" required>
          <label for="student_cnic">Student CNIC</label>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="guardian_name" name="guardian_name">
          <label for="guardian_name">Guardian's Name</label>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" required>
          <label for="email">Email</label>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <input type="tel" id="phone" name="phone" required>
          <label for="phone">Phone Number</label>
        </div>
      </div>

      <!-- Country, State, City -->
      <div class="form-row">
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
      </div>

      <!-- Submit Button -->
      <button type="submit" class="submit-btn">Register</button>
    </form>
  </div>
</body>
</html>