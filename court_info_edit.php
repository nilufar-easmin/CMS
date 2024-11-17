 <!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');
  include('function.php');
	
  $court_type_list = court_type_list();


	if(isset($_GET['court_id']))
	{
		$court_id = $_GET['court_id'];
		$sql = "select * from court_info where court_id = '$court_id'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
      $court_type_id	 		= $row['court_type_id'];
			$justice_name 		  = $row['justice_name'];
      $court_name 		    = $row['court_name'];
		  $court_id	 		      = $row['court_id'];
		}
	}
	
	if(isset($_POST['update']))
	{ 
    $court_type_id	 		= $_POST['court_type_id'];
    $justice_name 		  = $_POST['justice_name'];
    $court_name 		    = $_POST['court_name'];
		$court_id 		      = $_POST['court_id'];
		
		$sql = "update court_info set court_type_id	='$court_type_id', justice_name='$justice_name', court_name='$court_name' where court_id=$court_id";
    
		
		$result = $conn->query($sql);
		
		if($result)
		{
			echo "Update Successfully!";
			echo "<meta http-equiv='refresh' content='1;url=court_info_list_view.php'>";
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
        <h3> Court Information</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="court_info_edit.php" method="post">

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Type</label>
                  <div class="col-sm-6">
                  <select name="court_type_id" id="court_type_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_type_list as $key => $value)
                        {
                          if ($court_type_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                        }
                      ?>
                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Justice Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="justice_name" id="justice_name" value="<?php echo $justice_name; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="court_name" id="court_name" value="<?php echo $court_name; ?>" class="form-control">
                  </div>
                </div>


               

				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
					
					<input type="hidden" name="court_id" value="<?php echo $court_id;  ?>" class="btn btn-info">
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

      <script>
    function change_fuc()
    {
      const myElement = document.getElementById("court_type_id").value;
      
      if(myElement == 1 || myElement == 2)
      {
        document.getElementById("court_name").disabled = true;
        document.getElementById("justice_name").disabled = false;
        document.getElementById("court_name").value = "";
      }else{
        document.getElementById("justice_name").disabled = true;
        document.getElementById("court_name").disabled = false;
        document.getElementById("justice_name").value = "";
      }
      
      //alert(myElement);
    }

    

  </script>

      
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  
  <?php   include('footer_resources.php');  ?>

</body>

</html>
