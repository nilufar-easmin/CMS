<!DOCTYPE html>
<html lang="en">

<?php
	include('connection.php');

  if(isset($_GET['UserID']))
  {
    $UserID = $_GET['UserID'];
    $sql = "SELECT * FROM tbl_user where UserID = '$UserID' ";
    $result = $conn->query($sql);

  if($row = mysqli_fetch_array($result))
  {   
      $UserID = $row['UserID'];
      $UserName = $row['UserName'];
      $UserPassword = $row['UserPassword'];
      $UserEmail = $row['UserEmail'];
      $UserPhone = $row['UserPhone'];
      $UserPhoto = $row['UserPhoto'];
      $CreateDate = $row['CreateDate'];
    }
  }

  if(isset($_POST['update']))
  {   
      $UserID = $_POST['UserID'];
      $UserName = $_POST['UserName'];
      $UserPassword = $_POST['UserPassword'];
      $UserEmail = $_POST['UserEmail'];
      $UserPhone = $_POST['UserPhone'];	
      
      $CreateDate = $_POST['CreateDate'];
	  
	  
	  $image=rand(111,999).'_'.$_FILES['UserPhoto']['name'];
	  move_uploaded_file($_FILES['UserPhoto']['tmp_name'],'upload/'.$image);
	  
	  
	  
  
      $sql = "UPDATE tbl_user SET UserName ='$UserName', UserPassword = '$UserPassword', UserEmail = '$UserEmail', UserPhone = '$UserPhone', UserPhoto = '$image', CreateDate = '$CreateDate' where UserID = $UserID";
      $result = $conn->query($sql);
      
      if($result)
      {
          echo "Update Successfully!";
          echo "<meta http-equiv='refresh' content='1;url=user_info_list_view.php'>";
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
              <h4 class="mb"> Update User Information</h4>
              <form class="form-horizontal style-form" action="user_info_edit.php" method="post" enctype="multipart/form-data">
 
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="UserName" value="<?php echo $UserName; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="UserPassword" value="<?php echo $UserPassword; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="UserEmail"  value="<?php echo $UserEmail; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Phone No</label>
                  <div class="col-sm-10">
                    <input type="text" name="UserPhone" value="<?php echo $UserPhone;   ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Photo</label>
                  <div class="col-sm-10">
                    
					<input type="file" name="UserPhoto" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Create Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="CreateDate" value="<?php echo $CreateDate; ?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" align="center">
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                    <input type="hidden" name="UserID" value="<?php echo $UserID;?>" />
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