 <!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
	
	if(isset($_GET['court_type_id']))
	{
		$court_type_id = $_GET['court_type_id'];
		$sql = "select * from court_type where court_type_id = '$court_type_id'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
			$court_type_name 		= $row['court_type_name'];
			$court_type_id 		= $row['court_type_id'];
		}
	}
	
	if(isset($_POST['update']))
	{
		$court_type_name 		= $_POST['court_type_name'];
		$court_type_id 		= $_POST['court_type_id'];
		
		$sql = "update court_type set court_type_name='$court_type_name' where court_type_id=$court_type_id";
    
		
		$result = $conn->query($sql);
		
		if($result)
		{
			echo "Update Successfully!";
			echo "<meta http-equiv='refresh' content='1;url=court_type_list_view.php'>";
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
        <h3> Court Type  Information</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="court_type_info_edit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Type Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="court_type_name" value="<?php echo $court_type_name;  ?>" class="form-control">
                  </div>
                </div>

				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
					
					<input type="hidden" name="court_type_id" value="<?php echo $court_type_id;  ?>" class="btn btn-info">
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
