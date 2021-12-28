<?php 
include 'includes/db-inc.php';
include "includes/header.php"; 

if(isset($_POST['del'])){

	$id = $_POST['id'];

	$sql_del = "DELETE from books where BookId = $id"; 
	$error = false;
	$result = mysqli_query($conn,$sql_del);
			if ($result)
			{
			$error = true;
			}
			

 }


 

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
			<div class= "g-col-12 text-center"  style="margin-top:70px">
            	<h2>Books table</h2>
                </div>

</div>

	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Deleted Successfully!</strong>
            </div>
            <?php } ?>
		  	<div class="row">
		  	  <a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Book</button></a>
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			  </div>
  
			</div>
		  </div>

		  <table class="table table-bordered">
		
	 <thead>
	 <tr>
		 <th>BookId</th>	
			  <th>bookTitle</th>
			  <th>author</th>
			  <th>ISBN</th>
			  <th>bookCopies</th>
			  <th>publisherName</th>
			  <th>available</th>
			  <th>categories</th>
			   <th>Delete</th>
	 </tr>
</thead>

  <?php 
	$sql2 = "SELECT * from books";

	$query2 = mysqli_query($conn, $sql2); 
	$counter = 1;
	while ($row = mysqli_fetch_array($query2)) { ?>
	<tbody>
		<td><?php echo $counter++; ?></td>
		<td><?php echo $row['bookTitle']; ?></td>
		<td><?php echo $row['author']; ?></td>
		<td><?php echo $row['ISBN']; ?></td>	
		<td><?php echo $row['bookCopies']; ?></td>
		<td><?php echo $row['publisherName']; ?></td>
		<td><?php echo $row['available']; ?></td>
		<td><?php echo $row['categories']; ?></td>
		<form method='post' action='bookstable.php'>
		<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
		<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
		</form>
		</tbody>
	
<?php 	}
	

 ?>
		   </table>
		 
	  </div>
	</div>

	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
 function Delete() {
            return confirm('Would you like to delete the book');
        }
</script>
</body>
</html>