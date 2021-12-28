<?php 

require 'includes/db-inc.php';
session_start();
$student_name = $_SESSION['student-username'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Library Management</title>
	<style type="text/css">
		thead{background-color: orange}
	</style>
</head>
<body>
<div class="container">
<!-- navbar begins -->
 <?php include "includes/nav2.php"; ?>
	
	
	

	</div>

 <div class="container " style="margin-top: 100px">
 		<div class="row col-lg-12 col-lg-offset-1" style="margin-top: 30px;margin-bottom: 40px">
            <div class="col-lg-6 col-md-6">
            	<h2>Student Profile</h2>
            </div>
         </div>
            <div class="jumbotron">
               <table class="table table-bordered">
                    <?php 
                    $sql = "SELECT * from students where username = '$student_name'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) { ?>
                                 
                  <tbody> 
                    <tr> 
                    
                     <td>Name : </td>
                     <td><?php echo $row['name']; ?></td>
                     
                    </tr> 
                     
                    <tr> 
                     
                     <td>Email : </td>
                     <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                     <tr> 
                    
                     <td>Department : </td>
                     <td><?php echo $row['dept']; ?></td>
                    </tr>
                    
                    
                    <tr>
                     
                     <td>Phone Number : </td>
                     <td><?php echo $row['phoneNumber']; ?></td>
                    </tr> 
                    <tr>
                    
                     <td>Username : </td>
                     <td><?php echo $row['username']; ?></td>
                    </tr> 
                    <tr>
                     
                     <td>Password : </td>
                     <td><?php echo $row['password']; ?></td>
                    </tr>  
                   
                 </tbody> 
                 <?php } ?>
           </table>
         

            </div> 
      </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>