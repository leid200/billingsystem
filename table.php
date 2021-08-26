

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/table.css" />
    <link rel="stylesheet" href="./css/dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <style>
    .bar-1:hover {
  background: rgba(62, 161, 117, 0.3);
  color: #3ea175;
}

.bar-2:hover {
  background: rgba(62, 161, 117, 0.3);
  color: #3ea175;
}

.bar-3:hover {
  background: rgba(62, 161, 117, 0.3);
  color: #3ea175;
}
.bar-4:hover {
  background: rgba(62, 161, 117, 0.3);
  color: #3ea175;
} 
    
    </style>

    <title>Document</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <a class="active_link" href="#" >Admin</a>
      </div>
      <div class="navbar__right">
        <a href="#">
          <img width="30" src="assets/avatar.svg" alt="" />
          <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
        </a>
      </div>
    </nav>
    <div class="container">
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <h1>Grace Foundation</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>
        <div class="sidebar__menu">
          <div class="sidebar__link bar-1 ">
            <i class="fas fa-user-edit"></i>
            <a href="table.php" target="_blank">Manage Donors</a>
          </div>
          <div class="sidebar__link bar-2" >
            <i class="fas fa-user-plus"></i>
            <a href="./newdonor.php">Add Donor</a>
          </div>
          <div class="sidebar__link bar-3">
            <i class="fas fa-user-minus"></i>
            <a href="reset-password.php" >Edit Password</a>
          </div>
          <div class="sidebar__logout bar-4">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <div class="table-container">
    


      <!-- <table class="table table-sm table-hover"> -->
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="text-align:center;">DashBoard</h2>
                        <!-- <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a> -->
                    </div>
                    
                    <table class="table table-bordered table-striped" >
                    <thead >
                        <tr>
                            <th>Donar ID </th>
                            <th>Name</th>
                            <th>Date</th>

                            <th>Donar's Copy</th>
                            <th>Recipient's Copy</th>
                            <th>Upload Proof</th>
                            <th>View Proof</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <?php
                    // Include config file
                    require_once "config.php";
                    // Attempt select query execution
                  $sql = "SELECT * FROM donar ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            
                                echo "<tbody id='love'>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    
                                    if( $row['unknown']>0){
                                        echo "<td>". $row['id'] ."</td>";
                                        echo "<td>Unknown</td>";
                                        echo "<td>". $row['date'] . "</td>";
                                    }else{

                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";


                                    }
                                        // echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="bill_templet.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="">View</span></a>';
                                            
                                           
                                        echo "</td>";
                                        echo "<td>";
                                        echo '<a href="bill_rec.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="">View</span></a>';
                                        echo "</td>";
                                        echo "<td>";
                                        echo '<a href="up.php?id='. $row['id'] .'" title="Proof Record" data-toggle="tooltip"><span class="fa fa-upload"></span></a>';
                                        
                                        echo "</td>";

                                        echo "<td>";
                                        echo '<a href="showProof.php?id='. $row['id'] .'" title="Proof Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo "</td>";
                                        echo "<td>";
                                        echo '<a href="delete.php?id='. $row['id'] .'" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        
                                       
                                        echo "</td>";

                                        
                                        echo "<td>";
                                        echo '<a href="editdonar.php?id='. $row['id'] .'" class="mr-3" title="Edit Record" data-toggle="tooltip"><span class="fa fa-edit"></span></a>';
                                        
                                       
                                        echo "</td>";


                                         echo "</tr>";


                                }
                              
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<tr><td colspan="9"><em>No records were found.</em></td></tr>';
                        }   
                         echo "</tbody>";                            
                        echo "</table>";
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    
    <!-- </table> -->


    </div>
    <script src="./table.js"></script>
  </body>
</html>
