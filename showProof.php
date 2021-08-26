<?php 
// Include the database configuration file  
require_once 'config.php'; 
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($link,"select * from donar where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

$b= $data['id'];


$result = mysqli_query($link,"SELECT image FROM images where did='$b'"); // select query
$data1 = mysqli_fetch_array($result); // fetch data
// Get image data from database 
#$result = $link->query(); 


?>

<?php if($result->num_rows > 0){ ?> 


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
      <div class="title">View Proof</div>
      
      <div class="content">
      <div class="gallery"  style=""> 
       
       <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data1['image']); ?>" /> 
   
      </div> 
      <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
      <?php } ?>

        
      </div>
    </div>
    <script src="./form.js"></script>
  </body>
</html>





    











