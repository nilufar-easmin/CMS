<!DOCTYPE html>
<html lang="en">

<?php
	include('connection.php');
	
	if(isset($_GET['RoleID']))
	{
		$RoleID = $_GET['RoleID'];
		$sql = "select * from tbl_role_info where RoleID = '$RoleID'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
			$RoleName 	= $row['RoleName'];
			$RoleID 	= $row['RoleID'];
		}
	}
  if(isset($_POST['update']))
	{
		$RoleName = $_POST['RoleName'];
		$RoleID = $_POST['RoleID'];
		$sql = "update tbl_role_info set RoleName='$RoleName' where RoleID=$RoleID";
		$result = $conn->query($sql);
		
		if($result)
		{
			echo "Update Successfully!";
			echo "<meta http-equiv='refresh' content='1;url=role_info_list_view.php'>";
		}
	}
?>

<head>
  <?php include('header_resources.php'); ?>
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
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Fugaz+One&family=Righteous&family=Roboto+Condensed&family=Squada+One&display=swap');
      /* font-family: 'Fugaz One', cursive;
        font-family: 'Righteous', cursive;
        font-family: 'Roboto Condensed', sans-serif;
        font-family: 'Squada One', cursive; */

      h4 {
            /* font-family: 'Righteous', cursive; */
          font-size: 25px;
          font-weight: bolder;
          color: black;
          letter-spacing: 1px;
          margin-left: 15px;
      }

      label {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 16px;
        color: black;
        margin-left: 0px;
      }

      input {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 16px;
        color: black;
        margin-left: 0px;
      }

      .btn-success {
        font-family: 'Righteous', cursive;
        font-size: 17px;
        font-weight: bold;
        color: white;
        letter-spacing: 1px;
        background-color: skyblue;
        
      }
    </style>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb" style="color:black"> Update Role Information</h4>
              <form class="form-horizontal style-form" action="role_info_edit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="RoleName" value="<?php echo $RoleName;   ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" align="center">
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                    <input type="hidden" name="RoleID" value="<?php echo $RoleID;?>" />
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
  <?php   include('footer_resources.php');   ?>

</body>

</html>