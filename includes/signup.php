<head>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link

  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
  
/>
  <!-- Boxicons CSS -->
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
<link href="/assets/libs/frontend/MDB-UI-KIT-Pro-Essential-1.0.0/css/mdb.min.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
</head>
<section >
  <div class="container h-100">
  
      <br>
      <br>

          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="" method="post">
                
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" class="form-control" name="name" id="inputEmail4" required>
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                    <!-- <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
              Please Enter a valid Username
            </p>
          </span> -->
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" id="form3Example3c" class="form-control" required/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="phone" id="inputPassword4" class="form-control" required/>
                      <label class="form-label" for="form3Example3c">Mobile Number</label>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                   
                    <input type="password" class="form-control" name ="password" id="inputPassword4" required>
                      <label class="form-label" for="form3Example4c">Password</label>
                      <i class="bx bx-hide show-hide"></i>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                 
                    <input type="password" class="form-control" name ="confirm_password" id="inputPassword" required>
                      <label class="form-label" for="form3Example4cd">Confirm Password</label>
                      <i class="bx bx-hide show-hide"></i>
                    </div>
                   

                  </div>
<style>
.show-hide {
  position: absolute;
  right: 13px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 18px;
  color: #919191;
  cursor: pointer;
  padding: 3px;
}

.mx-md-4 {
    margin-right: 1.5rem!important;
    margin-left: 1.5rem!important;
    margin-top: -1.5rem;
}


  </style>
                  <div class="form-check d-flex justify-content-center mb-3">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit"  name="submit" value="Signup" class="btn btn-primary btn-lg">Create Account</button>
                  </div>
                
          <!-- <div class="divider d-flex align-items-center my-4">
           
                  
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div> -->
          <style>
            .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
body {
  overflow-y: hidden; /* Hide vertical scrollbar */
  overflow-x: hidden; /* Hide horizontal scrollbar */
}

element.style {
    background-color: #eee;
}
            </style>

<!-- <button class="btn btn-block btn-primary" style="background-color: #dd4b39;"
  type="submit"><i class="fab fa-google me-2 "></i> Sign in with google</button>

<button class="btn btn-block btn-primary mb-2" style="background-color: #3b5998;"
  type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
<br> -->
                <p class="text-center text-muted ">Have already an account? <a href="index.php"
                    class="fw-bold text-body link-danger"><u>Login here</u></a></p>
                    
                </form>
                
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>


</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
  });
// Hide and show password
const eyeIcons = document.querySelectorAll(".show-hide");

eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    const pInput = eyeIcon.parentElement.querySelector("input"); //getting parent element of eye icon and selecting the password input
    if (pInput.type === "password") {
      eyeIcon.classList.replace("bx-hide", "bx-show");
      return (pInput.type = "text");
    }
    eyeIcon.classList.replace("bx-show", "bx-hide");
    pInput.type = "password";
  });
});
</script>






<?php

//connect to the database
include_once 'database.php';
//check if form has been submitted
if(isset($_POST["submit"])){
    //get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    //validate form data
    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("All fields are required")';
        echo '</script>'; 
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Invalid email address")';
        echo '</script>'; 
    }elseif(strlen($phone) < 10){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Invalid Phone Number")';
        echo '</script>'; 

    }elseif($password != $confirm_password){
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Passwords do not match")';
      echo '</script>';  
    }elseif(strlen($password) < 8){
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Password must be at least 8 characters long")';
      echo '</script>'; 
        
    }else{
        //encrypt password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //generate verification code
        $verification_code = md5(rand());
        
        //store user data in the database
        $stmt = $db->prepare("INSERT INTO users (name, email, phone, password, verification_code, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $name, $email,$phone, $password, $verification_code);
        $stmt->execute();
        
        //send verification email
        $to = $email;
        $subject = "Signup Verification";
        $message = "Click the link to verify your email address: http://example.com/verify.php?code=$verification_code";
        $headers = "From: no-reply@example.com";
        mail($to, $subject, $message, $headers);
        echo '<script type ="text/JavaScript">';  
      echo 'alert("Signup successful!")';

      echo '</script>'; 
    }
}

?>

