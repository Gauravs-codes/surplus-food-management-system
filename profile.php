
<?php
session_start();
include("connection.php"); 

if(!isset($_SESSION['name']) || $_SESSION['name']==''){
	header("location: signin.php");
	exit();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<header>
        <div class="logo">Food <b style="color: #06C167;">Donate</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html" >About</a></li>
                <li><a href="contact.html"  >Contact</a></li>
                <li><a href="profile.php"  class="active">Profile</a></li>
            </ul>
        </nav>
    </header>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
  
    
    



    <div class="profile">
        <!-- Hero Section -->
        <div style="background: linear-gradient(135deg, #06C167 0%, #049954 100%); padding: 80px 20px; text-align: center; color: white; border-radius: 0 0 30px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
            <div style="width: 120px; height: 120px; border-radius: 50%; background: white; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; font-size: 60px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                👤
            </div>
            <h1 style="font-size: 42px; margin: 0 0 10px 0; font-weight: 600;">Welcome Back!</h1>
            <p style="font-size: 18px; opacity: 0.95;"><?php echo $_SESSION['name']; ?></p>
        </div>

        <div class="profilebox" style="max-width: 800px; margin: -40px auto 40px; padding: 0 20px;">
            <!-- Profile Info Card -->
            <div style="background: white; padding: 50px 40px; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.1); margin-bottom: 40px;">
                <h2 style="font-size: 28px; color: #333; margin-bottom: 30px; border-bottom: 3px solid #06C167; padding-bottom: 15px; display: inline-block;">Profile Information</h2>
                
                <div class="info" style="padding: 20px 0;">
                    <div style="margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #06C167;">
                        <p style="font-size: 14px; color: #666; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">Name</p>
                        <p style="font-size: 20px; color: #333; font-weight: 500; margin: 0;"><?php echo $_SESSION['name']; ?></p>
                    </div>
                    
                    <div style="margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #06C167;">
                        <p style="font-size: 14px; color: #666; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">Email</p>
                        <p style="font-size: 20px; color: #333; font-weight: 500; margin: 0;"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    
                    <div style="margin-bottom: 30px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #06C167;">
                        <p style="font-size: 14px; color: #666; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">Gender</p>
                        <p style="font-size: 20px; color: #333; font-weight: 500; margin: 0;"><?php echo $_SESSION['gender']; ?></p>
                    </div>
                    
                    <a href="logout.php" style="display: inline-block; background: linear-gradient(135deg, #06C167 0%, #049954 100%); color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-size: 16px; font-weight: 600; box-shadow: 0 8px 20px rgba(6,193,103,0.3); transition: all 0.3s ease;" 
                       onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 12px 30px rgba(6,193,103,0.4)'" 
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 20px rgba(6,193,103,0.3)'">
                        🚪 Logout
                    </a>
                </div>
            </div>

            <!-- Donations Section -->
            <div style="background: white; padding: 50px 40px; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.1);">
                <h2 style="font-size: 28px; color: #333; margin-bottom: 30px; border-bottom: 3px solid #06C167; padding-bottom: 15px; display: inline-block;">Your Donations</h2>
                <div class="table-container">
                    <div class="table-wrapper" style="overflow-x: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                        <table class="table" style="width: 100%; border-collapse: collapse; background: white;">
                            <thead>
                                <tr style="background: linear-gradient(135deg, #06C167 0%, #049954 100%); color: white;">
                                    <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">Food</th>
                                    <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">Type</th>
                                    <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">Category</th>
                                    <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $email=$_SESSION['email'];
                                $query="select * from food_donations where email='$email'";
                                $result=mysqli_query($connection, $query);
                                if($result==true){
                                    $count = 0;
                                    while($row=mysqli_fetch_assoc($result)){
                                        $count++;
                                        $bgColor = $count % 2 == 0 ? '#f8f9fa' : 'white';
                                        echo "<tr style='background: $bgColor; border-bottom: 1px solid #e9ecef; transition: all 0.3s ease;' onmouseover=\"this.style.background='#e8f5e9'; this.style.transform='scale(1.01)'\" onmouseout=\"this.style.background='$bgColor'; this.style.transform='scale(1)'\">";
                                        echo "<td style='padding: 20px; color: #333; font-size: 15px;'>".$row['food']."</td>";
                                        echo "<td style='padding: 20px; color: #333; font-size: 15px;'>".$row['type']."</td>";
                                        echo "<td style='padding: 20px;'><span style='background: #e8f5e9; color: #06C167; padding: 8px 15px; border-radius: 20px; font-size: 14px; font-weight: 500;'>".$row['category']."</span></td>";
                                        echo "<td style='padding: 20px; color: #666; font-size: 14px;'>".$row['date']."</td>";
                                        echo "</tr>";
                                    }
                                    if($count == 0){
                                        echo "<tr><td colspan='4' style='padding: 40px; text-align: center; color: #999; font-size: 16px;'>No donations yet. Start making a difference today! 🌟</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' style='padding: 40px; text-align: center; color: #999; font-size: 16px;'>Unable to load donations.</td></tr>";
                                }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
    
    
</body>
</html>