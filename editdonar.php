<?php

include "config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($link,"select * from donar where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    #$fullname = $_POST['fullname'];
    #$age = $_POST['age'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $unknown=$_POST['unknown'];
    $email=$_POST['email'];
    $date=$_POST['date'];
    $purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    $mode=$_POST['mode'];
    $mode_info=$_POST['mode_info'];
    $view ="Select count(*) as love from donar";

    $result = mysqli_query($link, $view);
    while ($row = $result->fetch_assoc()) {
        $love=$row['love'];
    }
    $love++;


    $id1="2021GF00".$love."";


    $edit = mysqli_query($link,"update donar set name='$name',id='$id1',unknown='$unknown',address='$address',email='$email',purpose='$purpose',amount='$amount',mode='$mode',mode_info='$mode_info',date='$date'");
	
    if($edit)
    {
        #mysqli_close($db); // Close connection

        
        header("location:welcome.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
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
        <form action="editdonar.php" method="POST">
        <input type="checkbox" value="1" class="info" name="unknown" /> Unknown/Choose to be discreet
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" value="<?php echo $data['name'] ?>" placeholder="Enter your name" name="name" required />
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" value="<?php echo $data['address'] ?>" placeholder="Enter your username" name="address" required />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" value="<?php echo $data['email'] ?>" placeholder="Enter your email" name="email" required />
            </div>
            <div class="input-box">
              <span class="details">Purpose of Donation</span>
              <textarea name="purpose"  id="" cols="30" rows="10" ><?php echo $data['purpose'] ?></textarea>
            </div>
            <div class="input-box">
              <span class="details">Amount</span>
              <input
                type="number" name="amount" value="<?php echo $data['amount'] ?>"
                placeholder="Amount to Donate"
                required
                min="1"
              />
            </div>

            <div class="input-box">
              <span class="details">Date of Billing</span>
              <input
                type="date" name="date" value="<?php echo $data['date'] ?>"
                placeholder="Enter Date"
                required
            />
            </div>

<!--             
            <div class="input-box">
              <span class="details" >Proof</span>
              <input type="file" placeholder="Attached your Proof" name="file" />
            </div> -->


          </div>
          <div class="gender-details">
            <input type="radio" name="mode"  <?php echo ($data['mode']=='cash')?'checked':'' ?> id="dot-1" />
            <input type="radio" name="mode"  id="dot-2" <?php echo ($data['mode']=='chqeue')?'checked':'' ?> />
            <input type="radio" name="mode"  id="dot-3"  <?php echo ($data['mode']=='credit card')?'checked':'' ?>/>
            <input type="radio" name="mode"  id="dot-4" <?php echo ($data['mode']=='upi')?'checked':'' ?> />
            <input type="radio" name="mode"  id="dot-5 " <?php echo ($data['mode']=='NEFT')?'checked':'' ?> />
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
                type="text" name="mode_info" value="<?php echo $data['mode_info'] ?>"
                placeholder="Enter Payment ID"
                required
            />
            </div>

          
          <div class="button">
          <input type="submit" name="update" value="Update">
          </div>
        </form>
      </div>
    </div>
    <script src="./form.js"></script>
  </body>
</html>
