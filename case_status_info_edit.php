<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
	
	if(isset($_GET['case_status_id']))
            {
              $case_status_id = $_GET['case_status_id'];
              $sql = "select * from case_status where case_status_id = '$case_status_id'";
              $result = $conn->query($sql);
              if($row = mysqli_fetch_array($result))
                    {
                      $case_status_name 		= $row['case_status_name'];
                      $case_status_id 		  = $row['case_status_id'];
                    }
            }
	
	if(isset($_POST['update']))
	{
            $case_status_name 		= $_POST['case_status_name'];
            $case_status_id 		  = $_POST['case_status_id'];
            
            $sql = "update case_status set case_status_name='$case_status_name' where case_status_id = $case_status_id";
            $result = $conn->query($sql);
		
		if($result)
              {
                echo "Update Successfully!";
                echo "<meta http-equiv='refresh' content='1;url=case_status_list_view.php'>";
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
             
              <form class="form-horizontal style-form" action="case_status_info_edit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Status Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_status_name" value="<?php echo $case_status_name;  ?>" class="form-control">
                  </div>
                </div>

				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
					
					<input type="hidden" name="case_status_id" value="<?php echo $case_status_id;  ?>" class="btn btn-info">
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
