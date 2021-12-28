<?php
require 'includes/db-inc.php';
 include "includes/header.php"; 

session_start();
$student = $_SESSION['student-name'];


	if (isset($_POST['check'])) {
		$id = $_POST['id'];
		
	$sql = "SELECT returnDate from borrow where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	 $row = mysqli_fetch_assoc($query);

	 $now = date_create(date('Y-m-d'));
	 "<br>";
	 $prev =  date_create(date("Y-m-d",strtotime($row['returnDate'])));
	 "<br>";
	  $diff = date_diff($prev,$now);
	 "<br>";
	$diff = str_replace('+', '', $diff->format('%R%a'));
	   if ($diff > 0) {
		// echo "greater";
		$fine = 30 * $diff;

	    $add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }
	  else if ($now < $prev){
	  	// echo "lesser";
	  $add = "UPDATE `borrow` SET `fine`= '0' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }

	}
?>


<div class="container">
    <?php include "includes/nav2.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
				<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2>Fines</h2>
                </div>

</div>
	
		<div class="container">
		  <table class="table table-bordered">
		          <thead>
		               <tr> 
		                  <th>ID</th>
		                  <th>Member Name</th>
		                  <th>Book Name</th>
		                  <th>Borrow date</th>
		                  <th>Return Date</th>
		                  <th>Overdue Charges</th>
		                </tr>    
		          </thead>  

		           <?php 
                  		$sql = "SELECT * FROM borrow where memberName = '$student'";
                  		$query = mysqli_query($conn, $sql);
                  		$counter = 1;
                  		while($row = mysqli_fetch_assoc($query)) { 
                   ?>

		          <tbody> 
		            <tr> 
		             <td><?php echo $counter++; ?></td>
		             <td><?php echo $row['memberName']; ?></td>
		             <td><?php echo $row['bookName']; ?></td>
		             <td><?php echo $row['borrowDate']; ?></td>
		             <td><?php echo $row['returnDate']; ?></td>
		             <td> 
		             	<?php echo $row['fine']; ?><form action="fine-student.php" method="post">
		             		<input type="hidden" name="id" value="<?php echo $row['borrowId']; ?>">
		             <button name="check" type="submit" class="btn btn-warning">CHECK</button>
		             </form>
		             </td>
		            </tr> 
		            <?php } ?> 
		         </tbody> 
		   </table>
		 </div>
		 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
</body>
</html>