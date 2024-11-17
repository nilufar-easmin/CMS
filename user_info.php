<!DOCTYPE html>
<html lang="en">

<?php
	include('connection.php');
	
	if(isset($_POST['save']))
	{
		  $UserName = $_POST['UserName'];
    	$UserPassword = $_POST['UserPassword'];
		  $UserEmail = $_POST['UserEmail'];
		  $UserPhone = $_POST['UserPhone'];	
      $UserPhoto = $_POST['UserPhoto'];
      $CreateDate =$_POST['CreateDate'];

		$image=rand(111,999).'_'.$_FILES['UserPhoto']['name'];
		move_uploaded_file($_FILES['UserPhoto']['tmp_name'],'upload/'.$image);

		$InsertQuery = "INSERT INTO tbl_user(UserName, UserPassword, UserEmail, UserPhone, UserPhoto,CreateDate) values ('$UserName', '$UserPassword', '$UserEmail', '$UserPhone', '$image','$CreateDate')";
    $data = mysqli_query($conn, $InsertQuery);

		if($data == 1)
		{
			echo "Successfully Inserted!";
			header("Location: user_info_list_view.php");
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
       
        font-size: 17px;
        font-weight: bold;
        color: black;
        letter-spacing: 1px;
        background-color:skyblue;
      }
    </style>



        <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel d-flex">
              <h4 class="mb"> User Information </h4>
              <form class="form-horizontal style-form" action="user_info.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label">User Name<span style="color:red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="UserName" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">User Password<span style="color:red">*</span></label>
                  <div class="col-sm-10">
                    <input type="password" name="UserPassword" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">User Email<span style="color:red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="UserEmail" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">User Phone No</label>
                  <div class="col-sm-10">
                    <input type="text" name="UserPhone" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="UserPhoto">Upload Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="UserPhoto" name="UserPhoto" accept="image/*" placeholder="Upload Product Image" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Create Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="CreateDate"  class="form-control">
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