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

		if(isset($_GET['lawyer_id']))
		{
			$lawyer_id = $_GET['lawyer_id'];
			
			$sql = "delete from lawyer_info where lawyer_id = '$lawyer_id'";
			//echo $sql; die;

			$conn->query($sql);
			header("Location: lawyer_list_view.php");
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
			<div class="div1">Lawyer List View</div>
			<div class="div2">
				<a href="lawyer_info.php" class="button1">Add New Lawyer</a>
			</div>
		</div>

		
		
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
			
			<?php /*?><tr style='background-color:purple; height:30px; text-align:center; color:black; font-weight:bold;'><?php */?>
              
              <hr>
			  	<?php
					
					$sql = "select * from lawyer_info";
					$rec = $conn->query($sql);
					
					echo "<table border='1' class='table' cellpadding='0' align='center'>";
					echo "<thead>
					<tr>
					<th>SL</th>
					<th>Lawyer Name</th>
					<th>Lawyer Email</th>
					<th>Lawyer Phone No</th>
					<th>Lawyer Type</th>
					<th>Action</th>
					</tr>
					</thead>";
					echo "<tbody>";
					
					$i=0;
					
					while($row = mysqli_fetch_array($rec))
					{
                      $i++;
						$lawyer_name		= $row['lawyer_name'];
						$lawyer_email 	    = $row['lawyer_email'];
					    $Phone_no	        = $row['Phone_no'];
                        $lawyer_type	    = $row['lawyer_type'];
						$lawyer_id 	    	= $row['lawyer_id'];
						
						echo "<tr>
						<td>$i</td>
						<td>$lawyer_name</td>
						<td>$lawyer_email</td>
						<td>$Phone_no</td>
                        <td>$lawyer_type</td>
						
						<td>
							<a href='lawyer_info_edit.php?lawyer_id=$lawyer_id' class='button2'>Update</a>
							<a href='lawyer_view.php?lawyer_id=$lawyer_id' class='btn btn-primary'>View</a>
							
							<a href='$_SERVER[SCRIPT_NAME]?lawyer_id=$lawyer_id' class='btn btn-danger' 
							onClick=\"return confirm('Are You sure to Delete?')\">Delete</a>
						
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
