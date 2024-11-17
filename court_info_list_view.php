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
	

		
		if(isset($_GET['court_id'])){
			//echo $_GET['employee_id']; die;
			$court_id = $_GET['court_id'];
			$sql="delete from court_info  where court_id =$court_id";
			//echo $sql;
			//die;
			$conn->query($sql);
			header("location:court_type_list_view.php");
			
			
		}
	
	
	?>
	
	<style>
		.div1{
			width:80%;
			font-size:24px;
			font-weight:bold;
			color:#3d5170;
			display:inline-block;
		}
		
		.div2{
			width:17%;
			display:inline-block;
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
		
		.button2{
			  background-color: #4CAF50; /* Green */
			  border: none;
			  color: white;
			  padding: 8px 20px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 14px;
			  margin:4px 2px;
			  border-radius:8px;
		
		
		}
	
	
	</style>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
	  
	  	<div>
			<div class="div1">Court Information</div>
			<div class="div2">
				<a href="court_info.php" class="button1">Add New Court Info</a>
			</div>
		</div>
		
		
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
			
			<?php /*?><tr style='background-color:purple; height:30px; text-align:center; color:black; font-weight:bold;'><?php */?>
              
              <hr>
			  	<?php
					
					$sql = "select * from court_info";

					
					$rec = $conn->query($sql);
					
					echo "<table border='1' class='table' cellpadding='0' align='center'>";
					echo "<thead>
					<tr>
					<th>SL</th>
					<th>Court Type</th>
					<th>Justice Name</th>
					<th>Court Name</th>
					<th>Action</th>
					</tr>
					</thead>";
					echo "<tbody>";
					
					$i=0;
					
					while($row = mysqli_fetch_array($rec))
					{
						$i++;
						$justice_name 		= $row['justice_name'];
						$court_name 		= $row['court_name'];
						$court_type_id	 	= $row['court_type_id'];
                        $court_id  		    = $row['court_id'];

						$court_type = array();
						$sql2 = "select * from court_type";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$court_type[$row2['court_type_id']] = $row2['court_type_name'];
						}
						
						echo "<tr>
						<td>$i</td>
						<td>$court_type[$court_type_id] </td>
						<td>$justice_name </td>
						<td>$court_name </td>
						
						
                   <td>
							<a href='court_info_edit.php?court_id=$court_id' class='button2'>Update</a>
							<a href='court_info_view.php?court_id=$court_id' class='btn btn-primary'>View</a>
							<a href ='$_SERVER[SCRIPT_NAME]?court_id=$court_id'
							class='btn btn-danger' onClick=\"return confirm('Are you sure to delete?')\">Delete</a>
						
						
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
