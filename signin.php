<?php
session_start();
include 'connection.php';
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
$msg=0;
if (isset($_POST['sign'])) {
  $email =mysqli_real_escape_string($connection, $_POST['email']);
  $password =mysqli_real_escape_string($connection, $_POST['password']);
 
  // $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  // $sanitized_password =  mysqli_real_escape_string($connection, $password);

  $sql = "select * from login where email='$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
 
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['gender'] = $row['gender'];
        header("location:home.html");
        exit();
      } else {
        $msg = 1;
   
      }
    }
  } else {
    echo "<h1><center>Account does not exists </center></h1>";
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
    <div class="container">
        <div class="regform">
            <form action=" " method="post">
                <div class="logo-container">
                    <p class="logo">Food<b style="color:#06C167;">Donate</b></p>
                </div>
                
                <p id="heading">Welcome back! 👋</p>
                <p class="subheading">Sign in to your account to continue</p>

                <div class="input">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope input-icon"></i>
                        <input type="email" placeholder="Enter your email" name="email" id="email" value="" required />
                    </div>
                </div>
                
                <div class="input">
                    <label for="password">Password</label>
                    <div class="password">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" placeholder="Enter your password" name="password" id="password" required />
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <?php
                    if($msg==1){
                        echo '<div class="error-message">';
                        echo '<i class="fa-solid fa-circle-exclamation"></i>';
                        echo '<span>Incorrect password. Please try again.</span>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <div class="btn">
                    <button type="submit" name="sign">
                        <span>Sign In</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                
                <div class="signin-up">
                    <p>Don't have an account? <a href="signup.php">Create Account</a></p>
                </div>
                
                <div class="back-home">
                    <a href="index.html"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>
                </div>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>
