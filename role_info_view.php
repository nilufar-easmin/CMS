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
		
		if(isset($_GET['RoleID']))
		{
			$RoleID = $_GET['RoleID'];
			$sql = "select * from tbl_role_info where RoleID = '$RoleID'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
			{
				$RoleID 	= $row['RoleID'];
				$RoleName 	= $row['RoleName'];
			}	
		}
	?>
		<!-- CSS Section -->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&family=Righteous&family=Roboto+Condensed&family=Squada+One&display=swap');
			.div1 {
				width: 80%;
				font-family: 'Righteous', cursive !important;
				font-size: 20px;
				font-weight: bold;
				color: blue;
				letter-spacing: 1px;
				margin-top: 5px;
				display: inline-block;
			}

			.div2 {
				width: 20%;
				float: right;
				margin-bottom: 10px;
			}
			.button1 {
				background-color: #449D44;
				font-family: 'Righteous', cursive;
				font-size: 17px;
				font-weight: bold;
				letter-spacing: 1px;
				color: black;
				border-radius: 5px;
				padding: 5px 5px;
				margin: 4px 2px;
				text-align: Left;
				text-decoration: none;
				display: inline-block;
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
				color: blue;
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
					<div class="div1">View Role Information</div>
					<div class="div2" align="right">
						<a href="role_info_list_view.php" class="button1">Back to Role List</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="content-panel">
							<div>
								<table border="1" width="100%" cellpadding="0" cellspacing="0"
									style="background-color:white">
									<tr style="height:40px;color:#000000">
										<th width="150px" style="text-align:left; padding-left:15px;">Role Name :</th>
										<td style="padding-left:15px;"><?php echo $RoleName; ?></td>
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