<?php

include "config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($link,"select * from donar where id='$id'"); // select query

$data = mysqli_fetch_array($qry); 


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bill.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Bill Template</title>
  </head>
  <body >
    <header class="first-area">
      <img src="./images/Logo.PNG" alt="grce logo" />
      <h3 class="reg">Registration No. E-1032</h3>
      <h2 class="title">GRACE FOUNDATION AURANGABAD – For a Better Life!</h2>
      <span class="sr"><h2>SR No. 2020-016</h2></span>
    </header>
    <hr class="new" />
    <span class="address"
      ><h2>
        Head Office:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        102 Aura Apts,Sarojini Road Extn.,Vile Parel West, Mumbai 400056,
        MAHARASHTRA
      </h2></span
    >
    <hr class="new1" />
    <span class="tax"
      ><h2>
        **ALL DONATION ARE ELIGIBLE FOR TAX EXEMPTION U/S 80(G) and 12AA OF
        INCOME TAX ACT**
      </h2></span
    >
    <span class="recp underline"><h2>DONATION RECEIPT</h2></span>
    <span class="date"><h2><?php echo $data['date']?></h2></span>
    <span class="donor"><h2>DONOR</h2></span>
    <div class="detail-1">
      <span class="info-1"
        ><h2>NAME: &nbsp; <?php echo $data['name']?></h2></span
      >
      <span class="info-2">
        <h2>ID: <?php echo $data['id']?></h2>
      </span>
      <span class="info-3">
        <h2>
          ADDRESS: &nbsp; <?php echo $data['address']?>
        </h2>
      </span>
      <span class="info-4">
        <h2>EMAIL: &nbsp; <?php echo $data['email']?></h2>
      </span>

      <br>
      <!-- <input type="checkbox" class="largebox" value="<?php#echo $data['unknown']?>" />
      <span class="check" > Unknown/Choose to be discreet</span>
    </div> -->
    <hr class="light-line" />

    <span class="donation"><h2>DONATION</h2></span>
    <span class="purpose"><h3>PURPOSE OF DONATION:</h3></span>
    <span class="C19"
      ><h2><?php echo $data['purpose']?></h2></span
    >
    <span class="ain">
      <h2>AMOUNT IN NUMBERS: INR <?php echo $data['amount']?></h2>
    </span>
    <span class="aiw">
      <h2>
        AMOUNT IN WORDS: &nbsp;&nbsp; Rupees <?php echo $data['amount']?> 
        ONLY-----------------
      </h2>
    </span>

    <span class="payment-mode">
      <h2 class="mod">MODE:</h2>
      <input type="checkbox" name="Cash" id="box" />
      CASH
      <input type="checkbox" name="UPI" id="box" />
      UPI
      <input type="checkbox" name="NEFT/IMPS" id="box" />
      NEFT/IMPS
      <input type="checkbox" name="Cheque" id="box" />
      Cheque
      <input type="checkbox" name="Credit/Debit Card" id="box" />
      Credit/Debit card
    </span>

    
    
    
    
    
    
    <span class="number">Cheque Number: NA</span>
    <span class="last"
      > Payment Mode:
      <div class="underline"><?php echo $data['mode']?> </div>
    </span>

    
    <span class="trans"
      >Tranaction ID(if Applicable)
      <div class="underline"><?php echo $data['mode_info']?> </div>
    </span>
    <hr class="light-line" />
    <span class="sign">
      <h2>RECIEVED WITH THANKS,</h2>
      <img src="./images/sign.PNG" alt="" />
      <h2>President,Grace Foundation Aurangabad.</h2>
    </span>
    <span class="stamp"><img src="./images/stamp.PNG" alt="" /></span>
    <span class="queries"
      ><h2>FOR ANY QUERIES: &nbsp; Grace Foundation Aurangabad(Regd.E-1032)</h2>
    </span>
    <span class="add2"
      ><h2>
        102 Aura Apts, Sarojini Road Extn., Vile Parle West, Mumbai 400056,
        MAHARASHTRA <br />
        PH: +91 9560786456
      </h2></span
    >
    <span class="dc"><h2>Donar's Copy</h2></span>
    <hr class="new3" />

    <span class="footer">
      <h2>GRACE FOUNDATION AURANGABAD &nbsp; CONFIDENTIAL</h2>
    </span>
    <span>
      <!-- <button class="button button1"><span>Download</span></button> -->
      <button class="button button2" onclick="window.print();">Print Bill</button>
    </span>
  </body>
</html>
