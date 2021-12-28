<?php 
	include 'includes/db-inc.php';
	include "includes/header.php";

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];
			 		

		if ($password1 == $password2) {
		$sql = "INSERT into admin (adminName, password, username, email) values ('$name', '$password1', '$username', '$email')";
		 
		$query = mysqli_query($conn, $sql);
		$error = false;

		if ($query) {
		$error = true;
		}
		else {
		echo "<script>alert('Admin not added!');
					</script>";	
		}

		}

		else {
			echo  "<script>alert('Password mismatched!')</script>";
		}

		
	}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			<?php if(isset($error)) { ?>
		<div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>Record Added Successfully!</strong>
			</div>
			<?php } ?>
			
			<p class="page-header" style="text-align: center">ADD ADMIN</p>

			<div class="container">
				<form class="form-horizontal" role="form" method="post" action="adduser.php" enctype="multipart/form-data">
				<div class="form-group">
						<label for="Name" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="Enter Full Name" id="name" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password1" placeholder="Enter Password" id="password" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password2" placeholder="Enter Password" id="password" required>
						</div>		
					</div>
          <div class="form-group">
            <label for="Password" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
            </div>
          </div>
          
					
					<div class="form-group ">
						<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-info col-lg-4 " name="submit">
								Submit
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript">
 	window.onload = function () {
		var input = document.getElementById('name').focus();
	}
 </script>
</body>
</html>