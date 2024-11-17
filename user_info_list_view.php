<!DOCTYPE html>
<html lang="en">
<?php  include('connection.php');?>

<head>
	<?php  include('header_resources.php'); ?>
</head>

<body>
	<section id="container">
	<?php
		include('header.php');
		include('nav.php');
		
		if(isset($_GET['UserID']))
		{
			$UserID = $_GET['UserID'];
			$sql = "delete from tbl_user where UserID = '$UserID'";
			$conn->query($sql);
			header("Location: user_info_list_view.php");
		}
	?>
		<!-- CSS only -->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&family=Righteous&family=Roboto+Condensed&family=Squada+One&display=swap');
			.div1 {
				
				font-size: 25px;
				font-weight: bold;
				color: black;
				letter-spacing: 1px;
				margin-top: 5px;
				padding-left: 20px;
				padding-right: 10px;
				display: inline-block;
				background-color: none;
			}
			
			
			.div2 {
				width: 20%;
				float: right;
				margin-bottom: 10px;
			}

			.button1 {
				background-color: skyblue;
				font-size: 17px;
				font-weight: bold;
				letter-spacing: 1px;
				color: white;
				border-radius: 5px;
				padding: 5px 5px;
				margin: 4px 2px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				margin-right: 50px;
			}

			.button2 {
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 8px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				margin: 4px 2px;
				border-radius: 8px;
			}

			.content-panel {
				background-color: white;
				padding: 5px !important;
				padding-top: 15px !important;
			}

			th, thead{
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 16px;
				font-weight: bold;
				text-align: center;
				color: color;
			}
			td{
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 16px;
				text-align: center;
				color: black;
			}
			table, thead, th, tr, td, tbody{
				border: 1px solid black;
			}

			.title_css {
				background-color: white;
				font-family: 'Roboto Condensed', sans-serif;
				padding: 5px;
				margin: 5px;
				border: 1px solid black;
			}  
		</style>

		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<div>
					<div class="div1">User List View</div>
					<div class="div2" align="right">
						<a href="user_info.php" class="button1" style="background-color:skyblue">Add New User</a>
					</div>
				</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="content-panel">
						<div class="table-responsive">
						<?php
							$sql = "select * from tbl_user";
							$rec = $conn->query($sql);
							
							echo "<table class='table' style='margin-bottom:10px';>";
							echo "<thead>
							<tr class='title_css'>
								<th>User ID</th> 
								<th>User Name</th>	
								<th>User Password</th>
								<th>User Email</th>
								<th>User Phone No</th>
								<th>User Photo</th>
								<th>User Create Date</th>
								<th>Action</th>
							</tr>
							</thead>";
							
							echo "<tbody>";
							while($row = mysqli_fetch_array($rec))
							{
								$UserID = $row['UserID'];
								$UserName = $row['UserName'];
								$UserPassword = $row['UserPassword'];
								$UserEmail = $row['UserEmail'];
								$UserPhone = $row['UserPhone'];
								$UserPhoto = $row['UserPhoto'];
								$CreateDate = $row['CreateDate'];
								
								$image = 'upload/'.$UserPhoto;

								echo "<tr class = 'Output'>
								<td style = 'text-align:center; vertical-align: middle;'>$UserID</td>
								<td style = 'text-align:left; vertical-align: middle;'>$UserName</td>
								<td style = 'text-align:center; vertical-align: middle;'>$UserPassword</td>
								<td style = 'text-align:center; vertical-align: middle;'>$UserEmail</td>
								<td style = 'text-align:center; vertical-align: middle;'>$UserPhone</td>
								<td style= 'text-align:center; vertical-align: middle;'><img src='$image' style='width:45px;height:50px;'/></td>
								<td style = 'text-align:center; vertical-align: middle;'>$CreateDate</td>
								<td style = 'text-align:center; vertical-align: middle;'> 
									<a href='user_info_view.php?UserID=$UserID' class='btn btn-success'>View</a> |
									<a href='user_info_edit.php?UserID=$UserID' class='btn btn-primary'>Update</a> |
									<a href='$_SERVER[SCRIPT_NAME]?UserID=$UserID' class='btn btn-danger' onClick=\"return confirm('Are You sure to Delete?')\">Delete</a>
								</td>
								</tr>";	
							}
							echo "</tbody>";
							echo "</table>";
						?>
						</div>
				</div>
			</div>
		</section>
	</section>
	
	<!--footer end-->
	</section>
	<?php include('footer_resources.php'); ?>
</body>
</html>

