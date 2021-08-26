<?php
include "config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
if(isset($_POST['submit'])) // when click on Update button
{ 
//   <input type="file" name="fileToUpload" id="fileToUpload">
    $n=$_POST['filename'];

    $edit = mysqli_query($link,"update donar set proof='$n'");
	
    if($edit)
    {
        #mysqli_close($db); // Close connection
        header("location:welcome.php"); // redirects to all records page
    
    }
    else
    {
        echo mysqli_error();
    }
}
?>
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
      <div class="title">Upload Proof</div>
      
      <div class="content">

        <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>Select image to upload:<h3>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <h3>Proof Title:</h3>
        <input type="text" name="filename" /><br><br>
        <input type="submit" value="Upload Image" class="btn btn-primary" name="submit">
        </form>

      </div>
    </div>
    <script src="./form.js"></script>
  </body>
</html>


