<?php
// require 'includes/snippet.php';
require 'includes/db-inc.php';
 include "includes/header.php";


 if(isset($_POST['submit'])){

    $news = $_POST['news'];

    $sql = "INSERT into news (announcement) values ('$news')"; 

    $query = mysqli_query($conn,$sql);
    $error = false;

       if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not successful!! Try again.');
                    </script>"; 
      }
 }




     if(isset($_POST['del'])){

        $id = $_POST['id'];

        $sql_del = "DELETE from news where newsId = $id"; 

        $result = mysqli_query($conn,$sql_del);
		 if ($result)
                {
                    echo "<script>
            
                   alert('Deleted successful');

        			 </script>";
                }
     }
  ?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<div class=" col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

	    <h4 class="center-block"><strong> Welcome</strong> <span>
		 <?php echo $admin; ?></span> </h4>
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



		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block">Published Announcements</h3>
			</div>
		  </div>
		  <table class="table table-bordered">
         

      		<thead>
                <tr>
                    <th>NewsId</th>
                         <th>Announcement</th>
                          
                          <th>Delete</th>
                </tr>
          </thead>

           <?php 

          $sql2 = "SELECT * from news";

      $query2 = mysqli_query($conn, $sql2);
      $counter = 1;
      while ($row = mysqli_fetch_array($query2)) {  ?>


        <tbody>
          <td><?php echo $counter++; ?></td>
          <td><?php echo $row['announcement']; ?></td>
         <form method='post' action='admin.php'>
        <input type='hidden' value="<?php echo $row['newsId']; ?>" name='id'>
       
        <td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
        </form>
        </tbody>

     <?php }
           ?>
		        
		         </tbody> 
		   </table>
		 
	  </div>

			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title center-block">Publish New Announcements</h2>
				  </div>
	  <div class="panel-body">
	    <form role="form" action="admin.php" method="post">
				<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 <div class="form-group ">
					      <label for="name">Announcement</label>   
					       <textarea class="form-control" rows="3" draggable="false" name="news">
					       </textarea>  
					  </div> 
					
				</div><br>
				<div class="input-group pull-right">
					<div class="form-group">
						<button class="btn btn-primary" name="submit">SUBMIT</button>
					</div>
				</div>
        				
        </form>
	</div>
	</div>	
	</div>





  <script type="text/javascript">
        
        function Delete() {
            return confirm('Would you like to delete the news');
        }

      </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
</body>
</html>