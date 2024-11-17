<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
	
	if(isset($_POST['save']))
	{
	  $lawyer_name		= $_POST['lawyer_name'];
    $lawyer_email		= $_POST['lawyer_email'];
    $Phone_no		    = $_POST['Phone_no'];
    $lawyer_type		= $_POST['lawyer_type'];
     
   

$sql = "insert into  lawyer_info (lawyer_name,lawyer_email,Phone_no,lawyer_type) values ('$lawyer_name','$lawyer_email','$Phone_no','$lawyer_type')";
	// echo 	$sql;
   //die;
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location:lawyer_list_view.php");
		}
	}
?>

<head>
  <?php  include('header_resources.php');   ?>
</head>

<body>
  <section id="container">
  
  	<?php
		
		include('header.php');
		
		include('nav.php');
	
	
	?>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3> Lawyer Information</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="lawyer_info.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_name" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Email</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_email" class="form-control">
                  </div>
                  </div>

                  


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Phone No</label>
                  <div class="col-sm-6">
                    <input type="text" name="Phone_no" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Type</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_type" class="form-control">
                  </div>
                  </div>



				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="save" class="btn btn-info">
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        
          
      
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  
  <?php   include('footer_resources.php');  ?>

</body>

</html>
