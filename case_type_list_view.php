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
	

		
		if(isset($_GET['case_type_id'])){
			//echo $_GET['employee_id']; die;
			$case_type_id = $_GET['case_type_id'];
			$sql="delete from case_type  where case_type_id =$case_type_id";
			//echo $sql;
			//die;
			$conn->query($sql);
			header("location:case_type_list_view.php");
			
			
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
			<div class="div1">Case Type List</div>
			<div class="div2">
				<a href="case_type_info.php" class="button1">Add New Case Type</a>
			</div>
		</div>
		
		
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
			
			<?php /*?><tr style='background-color:purple; height:30px; text-align:center; color:black; font-weight:bold;'><?php */?>
              
              <hr>
			  	<?php
					
					$sql = "select * from case_type";

					
					$rec = $conn->query($sql);
					
					echo "<table border='1' class='table' cellpadding='0' align='center'>";
					echo "<thead>
					<tr>
					<th>SL</th>
					<th>Case Type Name</th>
					<th>Action</th>
					</tr>
					</thead>";
					echo "<tbody>";
					
					$i=0;
					
					while($row = mysqli_fetch_array($rec))
					{
						$i++;
						$case_type_name 		= $row['case_type_name'];
					    $case_type_id  		    = $row['case_type_id'];
						
						echo "<tr>
						<td>$i</td>
						<td>$case_type_name</td>
						
                   <td>
							<a href='case_type_info_edit.php?case_type_id=$case_type_id' class='button2'>Update</a>
							<a href='case_type_view.php?case_type_id=$case_type_id' class='btn btn-primary'>View</a>
							<a href ='$_SERVER[SCRIPT_NAME]?case_type_id=$case_type_id'
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
