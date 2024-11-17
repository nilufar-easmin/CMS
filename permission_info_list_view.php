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
			$sql = "delete from tbl_permission_info where PermissionID = '$PermissionID'";
			$conn->query($sql);
			header("Location: permission_info_list_view.php");
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
				background-color:skyblue;
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
				color: black;
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
			table{
				padding-bottom: 0px;
				margin-bottom: 0px;
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
					<div class="div1">Permission List View</div>
					<div class="div2" align="right">
						<a href="permission_info.php" class="button1">Add New Permission</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="content-panel">
							<div class="table-responsive">
				<?php
					$sql = "select * from tbl_permission_info";
					$rec = $conn->query($sql);
					
					echo "<table class='table' style='margin-bottom:10px';>";
					echo "<thead>
					<tr class='title_css'>
					<th>SL</th>
					<th>User Name</th>
					<th>Role Name</th>
					<th>Action</th>
					</tr>
					</thead>";
					echo "<tbody>";
					
					$i=0;
					while($row = mysqli_fetch_array($rec))
					{
						$i++;
						$UserID 			= $row['UserID'];
						$RoleID 			= $row['RoleID'];
						$PermissionID  		= $row['PermissionID'];
				
						$User_array = array();
						$sql2 = "select * from tbl_user";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$User_array[$row2['UserID']] = $row2['UserName'];
						}

						$Role_array = array();
						$sql3 = "select * from tbl_role_info";
						$result3 = $conn->query($sql3);
						while($row3 = mysqli_fetch_array($result3))
						{
							$Role_array[$row3['RoleID']] = $row3['RoleName'];
						}

						echo "<tr>
						<td>$i</td>
						<td>$User_array[$UserID]</td>
						<td>$Role_array[$RoleID]</td>
						<td>
							<a href='permission_info_view.php?PermissionID=$PermissionID' class='btn btn-success'>View</a> | 
							<a href='permission_info_edit.php?PermissionID=$PermissionID' class='btn btn-primary'>Update</a> | 
							<a href='$_SERVER[SCRIPT_NAME]?PermissionID=$PermissionID' class='btn btn-danger' onClick=\"return confirm('Are You sure to Delete?')\">Delete</a>
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
	<?php   include('footer_resources.php');  ?>
</body>
</html>