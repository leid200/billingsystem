<?php 
// Include the database configuration file  
require_once 'config.php'; 
#$id = $_GET['id'];
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($link,"select * from donar where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 


    $id1=$_POST['iddata'];
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            
            
            $insert = mysqli_query($link,"INSERT into images (image, uploaded,did) VALUES ('$imgContent', NOW(),'$id1')"); // delete query
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                header("location:table.php");
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="up.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">    
    <input type="text" value="<?php echo $data['id'] ?>" name="iddata"/>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>