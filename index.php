<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Case Management System</title>

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<?php
		include('connection.php');
		if(isset($_POST['login'])) 
		{
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM tbl_user WHERE UserName='$user_name' AND UserPassword='$password'";
			$result = $conn->query($sql);
			$row = mysqli_fetch_array($result);
			$found = $result->num_rows;
			
		if($found==1) 
			{
			 //echo "OK";die;
			session_start();
			$_SESSION['login'] 	= 'loginDone';
			$_SESSION['UserName'] = $row['UserName'];
			$_SESSION['UserID'] 	= $row['UserID'];
			header("Location: dashboard.php");
			}else {
			echo "<span style='color: black; font-size: large; font-weight: bolder; text-align: center'>Invalid Login Information!</span>";
			}
		}
?>

<body>



  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="index.php" method="POST">
        <h2 class="form-login-heading">Welcome To Case Management System</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="user_name" placeholder="User Name" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password" required="required">
		  
		  <br>
		  <hr>
		 
		  
          
          <input type="submit" class="btn btn-theme btn-block" name="login" value="Login">
         
          
        </div>
        
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  
</body>

</html>
