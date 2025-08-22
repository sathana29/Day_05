<?php 
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $message = $_POST['message']; 

    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')"; 

    if ($conn->query($sql) === TRUE) { 
        echo "<p>Message sent successfully!</p>"; 
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 

    $conn->close(); 
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact-Library System Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
       background-color: lab(21.92% -8.17 -15.43 / 0.926); /* Black background */
      color: #fff;
      
    }

    .contact-section {
      background: linear-gradient(135deg, #a8a8a89e, #999999);

      color: #000;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgb(0, 0, 0);
    }

    .form-control, .form-control:focus {
      border-radius: 10px;
      border: none;
      box-shadow: none;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-custom {
      background-color:#1a2e40;
      color: #000;
      font-weight: bold;
      border: none;
      border-radius: 10px;
    }

    .btn-custom:hover {
      background-color:#cccccc;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
  <div class="container-fluid"> 
    <a class="navbar-brand" href="#">Library System Management</a> 

    <!-- 🔁 Toggler for mobile screens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 🔁 Collapsible navigation links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto"> 
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li> 
        <li class="nav-item"><a class="nav-link" href="form.php">Form</a></li> 
        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li> 
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> 
      </ul> 
    </div>
  </div> 
</nav>
 
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="contact-section">
        <h2 class="text-center mb-4">📬 Get in Touch</h2>
        <form method="POST" action="contact.php" onsubmit="return validateContactForm()">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control bg-secondary" id="name" name="name" placeholder="Your full name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control bg-secondary" id="email" name="email" placeholder="you@example.com" required>
  </div>

  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <textarea class="form-control bg-secondary" id="message" name="message" rows="4" placeholder="Your message..." required></textarea>
  </div>

  <div class="d-grid">
    <button type="submit" class="btn btn-custom">Send Message</button>
  </div>
</form>

      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
function validateContactForm() {
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let message = document.getElementById("message").value.trim();

  if (name === "" || email === "" || message === "") {
    alert("Please fill in all fields.");
    return false;
  }

  if (!email.includes("@") || !email.includes(".")) {
    alert("Please enter a valid email address.");
    return false;
  }

  alert("Message submitted successfully!");
  return true;
}
 
</script>
</body>
</html>
