<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');

  include('function.php');


  $court_type_list = court_type_list();
	
	if(isset($_POST['save']))
	{
    $court_type_id		    = $_POST['court_type_id'];
	  $justice_name		    = $_POST['justice_name'];
    $court_name		      = $_POST['court_name'];   

  $sql = "insert into  court_info (court_type_id,justice_name,court_name) values ('$court_type_id','$justice_name','$court_name')";
	// echo 	$sql;
  // die;
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location:court_info_list_view.php");
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
             
              <form class="form-horizontal style-form" action="court_info.php" method="post">

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Type</label>
                  <div class="col-sm-6">
                  <select name="court_type_id" id="court_type_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_type_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>


              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Justice Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="justice_name" id="justice_name" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="court_name" id="court_name" class="form-control">
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
