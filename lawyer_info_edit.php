<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
	
	if(isset($_GET['lawyer_id']))
	{
		$lawyer_id  = $_GET['lawyer_id'];
		$sql = "select * from  lawyer_info where lawyer_id = '$lawyer_id'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
			            $lawyer_name		    = $row['lawyer_name'];
					      	$lawyer_email 	    = $row['lawyer_email'];
					        $Phone_no	          = $row['Phone_no'];
                  $lawyer_type	      = $row['lawyer_type'];
					       	$lawyer_id 	    	  = $row['lawyer_id'];
		}
	}
	
	if(isset($_POST['update']))
	{
		    $lawyer_name  		= $_POST['lawyer_name'];
        $lawyer_email  		= $_POST['lawyer_email'];
        $Phone_no 		    = $_POST['Phone_no'];
        $lawyer_type	  	= $_POST['lawyer_type'];
		    $lawyer_id 		    = $_POST['lawyer_id'];
		
		$sql = "update lawyer_info set lawyer_name='$lawyer_name', lawyer_email='$lawyer_email', Phone_no='$Phone_no',lawyer_type='$lawyer_type' where lawyer_id=$lawyer_id";
		
		$result = $conn->query($sql);
		
		if($result)
		{
			echo "Update Successfully!";
			echo "<meta http-equiv='refresh' content='1;url=lawyer_list_view.php'>";
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
             
              <form class="form-horizontal style-form" action="lawyer_info_edit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_name" value="<?php echo $lawyer_name  ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Email</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_email" value="<?php  echo $lawyer_email; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Phone No</label>
                  <div class="col-sm-6">
                    <input type="text" name="Phone_no" value="<?php  echo $Phone_no; ?>" class="form-control">
                  </div>
                </div>
				
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Type</label>
                  <div class="col-sm-6">
                    <input type="text" name="lawyer_type" value="<?php  echo $lawyer_type; ?>" class="form-control">
                  </div>
                </div>
				
				
				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
					
					<input type="hidden" name="lawyer_id" value="<?php echo $lawyer_id;  ?>" class="btn btn-info">
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
