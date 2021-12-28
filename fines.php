<?php
 include 'includes/db-inc.php';
 include "includes/header.php"; 


if(isset($_POST['del'])){
	$id = $_POST['del-btn'];
	$msg = "paid";
	$sql = "UPDATE borrow set `fine` = '$msg' where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if($query){
		$error = true;
	}

	
}

 ?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
		<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2><strong>Fines<strong></h2>
                </div>
	</div>

	</div>
	<div class="container">
		<div class="panel panel-default">
		  
		  	 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Updated Successfully!</strong>
            </div>
            <?php } ?>
		
		  <table class="table table-bordered">
		          <thead>
		               <tr> 
		                  <th>ID</th>
		                  <th>Member Name</th>
		                  <th>Book Name</th>
		                  <th>Borrow date</th>
		                  <th>Return Date</th>
		                  <th>Overdue Charges</th>
		                  <th>ACTION</th>
		                </tr>    
		          </thead>  

		           <?php 
                  		$sql = "SELECT * FROM borrow";
                  		$query = mysqli_query($conn, $sql);
                  		while($row = mysqli_fetch_assoc($query)) { 
                   ?>

		          <tbody> 
		            <tr> 
		             <td><?php echo $row['borrowId']; ?></td>
		             <td><?php echo $row['memberName']; ?></td>
		             <td><?php echo $row['bookName']; ?></td>
		             <td><?php echo $row['borrowDate']; ?></td>
		             <td><?php echo $row['returnDate']; ?></td>
		             <td><?php echo $row['fine']; ?></td>
		             <td><form action="fines.php" method="post"> 
                     		<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
                      <button class="btn btn-warning" name="del">STOP COUNT</button>
                     	</form>
		             </td>
		            </tr> 
		            <?php } ?> 
		         </tbody> 
		   </table>
		 
	  </div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>