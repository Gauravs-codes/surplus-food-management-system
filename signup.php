<?php
include 'connection.php';
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
if(isset($_POST['sign']))
{

    $username=mysqli_real_escape_string($connection, $_POST['name']);
    $email=mysqli_real_escape_string($connection, $_POST['email']);
    $password=mysqli_real_escape_string($connection, $_POST['password']);
    $gender=mysqli_real_escape_string($connection, $_POST['gender']);

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from login where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){

        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
      
        header("location:signin.php");
        exit();
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <div class="regform">
            <form action=" " method="post">
                <div class="logo-container">
                    <p class="logo">Food<b style="color: #06C167;">Donate</b></p>
                </div>
                
                <p id="heading">Create Your Account</p>
                <p class="subheading">Join us in making a difference today</p>
                
                <div class="input">
                    <label class="textlabel" for="name">Full Name</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required/>
                    </div>
                </div>
                
                <div class="input">
                    <label class="textlabel" for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required/>
                    </div>
                </div>
                
                <div class="input">
                    <label class="textlabel" for="password">Password</label>
                    <div class="password">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password" id="password" placeholder="Create a strong password" required/>
                        <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
                    </div>
                </div>
    
                <div class="input">
                    <label class="textlabel">Gender</label>
                    <div class="radio">
                        <label class="radio-option">
                            <input type="radio" name="gender" id="male" value="male" required/>
                            <span class="radio-custom"></span>
                            <i class="fa-solid fa-mars"></i> Male
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" id="female" value="female"/>
                            <span class="radio-custom"></span>
                            <i class="fa-solid fa-venus"></i> Female
                        </label>
                    </div>
                </div>
                
                <div class="btn">
                    <button type="submit" name="sign">
                        <span>Create Account</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                
                <div class="signin-up">
                    <p>Already have an account? <a href="signin.php">Sign In</a></p>
                </div>
                
                <div class="back-home">
                    <a href="index.html"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>
                </div>
            </form>
        </div>
    </div>

    <script src="admin/login.js"></script>
</body>
</html>