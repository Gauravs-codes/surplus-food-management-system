<?php
session_start();
include("connection.php"); 
if(!isset($_SESSION['name']) || $_SESSION['name']==''){
	header("location: signin.php");
	exit();
}
$emailid= $_SESSION['email'];
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=mysqli_real_escape_string($connection, $_POST['image-choice']);
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        header("location:delivery.html");
        exit();
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #06C167;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo">Food <b style="color: #06C167; ">Donate</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(number of person /kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <!-- <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div> -->
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="district">District:</label>
<select id="district" name="district" style="padding:10px;">
  <option value="lucknow">Lucknow</option>
  <option value="kanpur">Kanpur</option>
  <option value="ghaziabad" selected>Ghaziabad</option>
  <option value="agra">Agra</option>
  <option value="varanasi">Varanasi</option>
  <option value="meerut">Meerut</option>
  <option value="allahabad">Allahabad (Prayagraj)</option>
  <option value="bareilly">Bareilly</option>
  <option value="aligarh">Aligarh</option>
  <option value="moradabad">Moradabad</option>
  <option value="saharanpur">Saharanpur</option>
  <option value="gorakhpur">Gorakhpur</option>
  <option value="noida">Gautam Buddha Nagar (Noida)</option>
  <option value="firozabad">Firozabad</option>
  <option value="jhansi">Jhansi</option>
  <option value="muzaffarnagar">Muzaffarnagar</option>
  <option value="mathura">Mathura</option>
  <option value="rampur">Rampur</option>
  <option value="shahjahanpur">Shahjahanpur</option>
  <option value="farrukhabad">Farrukhabad</option>
  <option value="maunath-bhanjan">Maunath Bhanjan</option>
  <option value="hapur">Hapur</option>
  <option value="etawah">Etawah</option>
  <option value="mirzapur">Mirzapur</option>
  <option value="bulandshahr">Bulandshahr</option>
  <option value="sambhal">Sambhal</option>
  <option value="amroha">Amroha</option>
  <option value="hardoi">Hardoi</option>
  <option value="fatehpur">Fatehpur</option>
  <option value="raebareli">Raebareli</option>
</select> 

        <label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>