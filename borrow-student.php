<?php
include "includes/header.php";


?>


<div class="container">
    <?php include "includes/nav2.php"; ?>
	
				<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2>Borrow Books</h2>
                </div>
            
	</div>

	

	</div>

	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
<!--         
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			  <form method="post" action="borrowedbooks.php" enctype="multipart/form-data">
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <button class="btn btn-success" placeholder="enter book name" name="search">Search</button> 
				      </span>
				      <input type="text" class="form-control" name="text">
			      </div>
			  	</form>
			    
			  </div>
  
			</div>
		  </div> -->

		  <table class="table table-bordered">
		         <tr> 
					<th>ID</th>
					<th>BOOK</th>
					<th>AVAILABLE</th>
					<th>BORROW</th>
				  </tr>    
					</thead>
					 <?php

					$sql = "SELECT * FROM books"; 	
					
					$query = mysqli_query($conn, $sql);
					$counter = 1;
						while($row = mysqli_fetch_array($query)){
							$_SESSION['book_Title'] = $row['bookTitle'];
							
							?>
							<tbody>
							<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookTitle'];?></td>
							<td><?php echo $row['available']; ?></td>
							
							  
							<td><a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" id="show" class="show-in"><button class="btn btn-success">Borrow Now
	
							</button>
							<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
							<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
							<input type="hidden" class="purpose" value="show">
							</a></td>
							</tr>
							</tbody>
							<?php }
					
					 ?>
					 </table>
		 
	  </div>
	</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
</body>
</html>