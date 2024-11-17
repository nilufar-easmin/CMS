<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
	
	if(isset($_POST['save']))
	{
	$case_status_name		= $_POST['case_status_name'];
   
   

$sql = "insert into  case_status  (case_status_name) values ('$case_status_name')";
	// echo 	$sql;
  // die;
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location:case_status_list_view.php");
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
        <h3> Case Status Information</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="case_status_info.php.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Status Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_status_name" class="form-control">
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
