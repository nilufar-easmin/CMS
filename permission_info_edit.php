<!DOCTYPE html>
<html lang="en">

<?php
  include('connection.php');
	include('function.php');
	
	$user_list = user_list();
	$role_list = role_list();
	
	if(isset($_GET['PermissionID']))
	{
		$PermissionID = $_GET['PermissionID'];
		
		$sql = "select * from tbl_permission_info where PermissionID = '$PermissionID'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
			$UserID 		    = $row['UserID'];
			$RoleID 		    = $row['RoleID'];
			$PermissionID 	= $row['PermissionID'];
		}
	}
		
	if(isset($_POST['update']))
	{
		$UserID  		    =  $_POST['UserID'];
		$RoleID  		    =  $_POST['RoleID'];
		$PermissionID   =  $_POST['PermissionID'];
		
		$sql = "update tbl_permission_info set UserID='$UserID', RoleID='$RoleID' where PermissionID=$PermissionID";
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location: permission_info_list_view.php");
		}
	}
?>

<head>
  <?php    include('header_resources.php');   ?>
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
     
        font-size: 17px;
        font-weight: bold;
        color:white;
        letter-spacing: 1px;
        background-color: skyblue;
        margin-left: -160px;
      }

     
    </style>

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb">Update Permission Information</h4>
              <form class="form-horizontal style-form" action="permission_info_edit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Name <span style="color:red">*</span></label>
                  <div class="col-sm-10">
                    <select name="UserID" style="height:30px; width:600px;">
                      <?php
                        foreach($user_list as $key => $value)
                        {
                          if($UserID==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else 
                          {
                            echo "<option value='$key'>$value</option>";
                          }
                        }						
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role Name</label>
                  <div class="col-sm-10">
                    <select name="RoleID" style="height:30px; width:600px;">
                      <?php
                        foreach($role_list as $key => $value)
                        {
                          if($RoleID==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else 
                          {
                            echo "<option value='$key'>$value</option>";
                          }
                        }						
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-12" align="center">
                    <input type="submit" class="btn btn-success" name="update" value="Update">
                    <input type="hidden" name="PermissionID" value="<?php echo $PermissionID;  ?>" />
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