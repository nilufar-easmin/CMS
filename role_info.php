<!DOCTYPE html>
<html lang="en">

<?php
	include('connection.php');
	
	if(isset($_POST['save']))
	{
		$RoleName = $_POST['RoleName'];
		$sql = "INSERT INTO tbl_role_info(RoleName) values ('$RoleName')";
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location: role_info_list_view.php");
		}
	}
?>

<head>
  <?php include('header_resources.php');   ?>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php  include('header.php');    ?>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php   include('nav.php');  ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    
        <!-- CSS Section -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Fugaz+One&family=Righteous&family=Roboto+Condensed&family=Squada+One&display=swap');
        /* font-family: 'Righteous', cursive;
        font-family: 'Roboto Condensed', sans-serif;*/

        h4 {  
          font-family: 'Righteous', cursive;
          font-size: 20px;
          font-weight: bolder;
          color: blue;
          letter-spacing: 1px;
          margin-left: 0px;
        }
        label{
          font-family: 'Roboto Condensed', sans-serif;
          font-size: 16px;
          color: black;
          margin-left: 0px;
        }
        input{
          font-family: 'Roboto Condensed', sans-serif;
          font-size: 16px;
          color: black;
          margin-left: 0px;
        }
        .btn-success{
          font-family: 'Righteous', cursive;
          font-size: 17px;
          font-weight: bold;
          color: black;
          letter-spacing: 1px;
          
                }
      </style>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"> Role Information</h4>

              <form class="form-horizontal style-form" action="role_info.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role Name <span style="color:red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="RoleName" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" align="center">
                    <input type="submit" class="btn btn-success" name="save" value="Submit">
                  </div>
                </div>

              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->

        <!-- /row -->
        <!-- INPUT MESSAGES -->

        <!-- /row -->
        <!-- INPUT MESSAGES -->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include('footer_resources.php'); ?>
</body>
</html>