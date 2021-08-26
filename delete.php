
<?php 

require_once "config.php";
$id = $_GET['id']; // get id through query string

                    

$del = mysqli_query($link,"delete from donar where id = '$id'"); // delete query
$del1 = mysqli_query($link,"delete from images where did = '$id'"); // delete query

if($del && $del1)
{
    // mysqli_close($db); // Close connection
    header("location:welcome.php"); // redirects to all records page
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>