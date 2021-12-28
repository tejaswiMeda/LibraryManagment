<?php
include 'includes/db-inc.php';
include "includes/header.php";

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2>Borrow Books</h2>
                </div>

	</div>

	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	
		  </div>

		  <table class="table table-bordered">
		  <thead>
					<tr> 
					<th>ID</th>
					<th>Book Name</th>
					 <th>STUDENT</th>
				    </tr>    
		    </thead>
				
				<?php
                    $sql = "SELECT * FROM borrow" ; 	
					
					$query = mysqli_query($conn, $sql);
					$counter =1;
						while($row = mysqli_fetch_array($query)){
							
						?>
							<tbody>
							<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookName']; ?></td>
							<td><?php echo $row['memberName']; ?></td>
							</tr>
							</tbody>
							<?php }
					
					 ?>
					 </table>
						
				

		         
		   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
	var book_name = search;
</script>
</body>
</html>