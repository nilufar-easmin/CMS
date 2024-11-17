<!DOCTYPE html>
<html lang="en">
<?php  include('connection.php');  ?>
<head>
	<?php  include('header_resources.php');   ?>
</head>

<body>
	<section id="container">
		<?php
		include('header.php');
		include('nav.php');
		
		if(isset($_GET['PermissionID']))
		{		
			$PermissionID = $_GET['PermissionID'];
			$sql = "select * from tbl_permission_info where PermissionID = '$PermissionID'";
			$result = $conn->query($sql);
			if($row = mysqli_fetch_array($result))
			{
				$UserID 		= $row['UserID'];
				$RoleID 		= $row['RoleID'];
				$PermissionID 	= $row['PermissionID'];
			}
		}
		
		$user_list = array();
		$sql2 = "select * from tbl_user";
		$result2 = $conn->query($sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$user_list[$row2['UserID']] = $row2['UserName'];
		}
		
		$role_list = array();
		$sql3 = "select * from tbl_role_info";
		$result3 = $conn->query($sql3);
		while($row3 = mysqli_fetch_array($result3))
		{
			$role_list[$row3['RoleID']] = $row3['RoleName'];
		}
	?>
		
		<!-- CSS Section -->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&family=Righteous&family=Roboto+Condensed&family=Squada+One&display=swap');
			.div1{
			width:80%;
			font-size:24px;
			font-weight:bold;
			color:#3d5170;
			display:inline-block;
		}

			.div2 {
				width: 20%;
				float: right;
				margin-bottom: 10px;
			}

			.button1{
			  background-color: skyblue; /* Green */
			  border: none;
			  color: white;
			  padding: 8px 20px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			  margin:4px 2px;
			  border-radius:8px;
		
		
		}

			.button2 {
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 8px 20px;
				text-align: Left;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				margin: 4px 2px;
				border-radius: 8px;
			}

			.content-panel {
			background-color: white;
			padding: 10px 5px 10px 5px !important;
			}

			th, thead{
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 16px;
				font-weight: bold;
				text-align: Left;
				color: black;
			}
			td{
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 16px;
				text-align: Left;
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
					<div class="div1">View Permission Information</div>
					<div class="div2" align="right">
						<a href="role_info_list_view.php" class="button1">Back to Permission List</a>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="content-panel">
							<div>
								<table border="1" width="100%" cellpadding="0" cellspacing="0"
									style="background-color:white">
									<tr style="height:50px;color:#000000">
										<th width="200px" style="text-align:Left; padding-left:15px;">User Name :</th>
										<td style="padding-left:15px;"><?php  echo $user_list[$UserID];  ?></td>
									</tr>
									<tr style="height:50px;color:#000000">
										<th width="200px" style="text-align:Left; padding-left:15px;">Role Name :</th>
										<td style="padding-left:15px;"><?php  echo $role_list[$RoleID];  ?></td>
									</tr>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</section>


		<!--footer end-->
	</section>

	<?php   include('footer_resources.php');  ?>

</body>

</html>