<?php

require_once("config.php");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// $id = $_GET['id']; // get id through query string

// $qry = mysqli_query($link,"select * from donar where sno='$id'"); // select query

// $data = mysqli_fetch_array($qry); // fetch data


if (isset($_POST['submit'])){
$name=$_POST['name'];
$address=$_POST['address'];
$unknown=$_POST['unknown'];
$email=$_POST['email'];
$date=$_POST['date'];
$purpose=$_POST['purpose'];
$amount=$_POST['amount'];
$mode=$_POST['mode'];
$mode_info=$_POST['mode_info'];

$view ="Select count(DISTINCT id) as love from donar";

$result = mysqli_query($link, $view);
while ($row = $result->fetch_assoc()) {
    $love=$row['love'];
}
$love++;


$id1="2021GF00".$love."";
echo $id1;

$sql = "INSERT INTO donar (name,id,unknown,address,email,purpose,amount,mode,mode_info,date)
VALUES ('".$_POST["name"]."','".$id1."','".$_POST["unknown"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["purpose"]."','".$_POST["amount"]."','".$_POST["mode"]."','".$_POST["mode_info"]."','".$_POST["date"]."')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
#echo $name." ".$address." ".$unknown." ".$email." ".$purpose." ".$amount;
#echo $date." ".$purpose." ".$amount." ".$mode; 
header("location: welcome.php");

}


?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/form.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="container">
      <div class="title">Registration</div>
      
      <div class="content">
        <form action="newdonor.php" method="POST">
        <input type="checkbox" value="1" class="info" name="unknown" /> Unknown/Choose to be discreet
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name"  name="name" required />
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" placeholder="Enter your username"   name="address" required />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Enter your email"  name="email" required />
            </div>
            <div class="input-box">
              <span class="details">Purpose of Donation</span>
              <textarea name="purpose"  id="" cols="30" rows="10" ></textarea>
            </div>
            <div class="input-box">
              <span class="details">Amount</span>
              <input
                type="number" name="amount" 
                placeholder="Amount to Donate"
                required
                min="1"
              />
            </div>

            <div class="input-box">
              <span class="details">Date</span>
              <input
                type="date" name="date" value="<?php echo $data['date'] ?>"
                placeholder="Enter Date"
                required
            />
            </div>

<!--             
            <div class="input-box">
              <span class="details" >Proof</span>
              <input type="file" placeholder="Attached your Proof"  name="file" />
            </div> -->


          </div>
          <div class="gender-details">
            <input type="radio" name="mode" value="cash" id="dot-1" />
            <input type="radio" name="mode" value="chqeue" id="dot-2" />
            <input type="radio" name="mode" value="credit card" id="dot-3" />
            <input type="radio" name="mode" value="upi" id="dot-4" />
            <input type="radio" name="mode" value="NEFT" id="dot-5" />
            <span class="gender-title">Payment mode</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Cash</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Chqeue</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender credit" > <a href="./credit.html"></a> Credit Card</span>
              </label>
              <label for="dot-4">
                <span class="dot four"></span>
                <span class="gender">Upi</span>
              </label>
              </label>
              <label for="dot-5">
                <span class="dot five"></span>
                <span class="gender">NEFT</span>
              </label>
            </div>

            
            
          </div>
            <div class="input-box">
              <span class="details">Mode Info</span>
              <input
                type="text" name="mode_info" 
                placeholder="Enter Payment ID"
                required
            />
            </div>

          
          <div class="button">
            <input type="submit" value="submit" name="submit" />
          </div>
        </form>
      </div>
    </div>
    <script src="./form.js"></script>
  </body>
</html>
