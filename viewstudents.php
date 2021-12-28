s<?php 
include 'includes/db-inc.php';
include "includes/header.php"; 

	if (isset($_POST['submit'])) {
		$id = trim($_POST['del_btn']);
		$sql = "DELETE from students where studentId = '$id' ";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			echo "<script>alert('Student Deleted!')</script>";
		}
	}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2><strong>Student table</strong></h2>
                </div>
	</div>




	</div>
	<div class="container col-lg-11 ">
		<div class="container">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	<div class="row">
		  	  <a href="addstudent.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></a>
			  
  
			</div>
		  </div>
		
		  <table class="table table-bordered">
		          <thead>
		               <tr>
		               	  <th>ID</th> 
		                  <th>Student Name</th>
		                  <th>Email</th>
		                  <th>Department</th>
		                  <th>Phone No.</th>
		                  <th>Username</th>
		                  <th>Password</th>
		                  <th>Delete</th>
		                </tr>    
		          </thead>    
		          <?php 

		          $sql = "SELECT * FROM students";
		          $query = mysqli_query($conn, $sql);
		          $counter = 1;
		          while ( $row = mysqli_fetch_assoc($query)) {        	
		           ?>
		          <tbody> 
		            <tr> 
		             <td><?php echo $counter++; ?></td>
		             <td><?php echo $row['name']; ?></td>
		             <td><?php echo $row['email']; ?></td>
		             <td><?php echo $row['dept']; ?></td>
		             <td><?php echo $row['phoneNumber']; ?></td>
		             <td><?php echo $row['username']; ?></td>
		             <td><?php echo $row['password']; ?></td>
		             <td>
		             	<form action="viewstudents.php" method="post">
		             	<input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
		             <button name="submit" class="btn btn-warning">DELETE</button>
		             </form> 
		         	</td>
		            </tr> 
		           
		         </tbody> 
		         <?php } ?>
		   </table>
		</div>
	  </div>
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>