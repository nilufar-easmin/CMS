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
	
		
	
	
	?>

<?php

if(isset($_GET['case_details_id'])){

	//echo $_GET['case_details_id']; die;
	$case_details_id = $_GET['case_details_id'];
	$sql="delete from  case_details where case_details_id =$case_details_id";
	//echo $sql;
	//die;
	$conn->query($sql);
	header("location:case_details_list_view.php");
	
	
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
			<div class="div1">Case Details View</div>
			<div class="div2">
				<a href="case_details_info.php" class="button1">Add New Case Details</a>
			</div>
		</div>
		

        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
			
			<?php /*?><tr style='background-color:purple; height:30px; text-align:center; color:black; font-weight:bold;'><?php */?>
              
              <hr>
			  	<?php
					
					$sql = "select * from case_details";

					
					$rec = $conn->query($sql);
					
					echo "<table border='1' class='table' cellpadding='0' align='center'>";
					echo "<thead>
					<tr>
					    <th>SL</th>
					    <th>Court Type Name</th>
						<th>Court Name</th>
						<th>Judge Name</th>
						<th>Case Type Name</th>
						<th>Case No </th>
						<th>Case Status name</th>
						<th>Lawyer Name</th>
						<th>Case Summary</th>
						<th>Petitioners Name</th>
						<th>Respondent Name</th>
						<th>Action</th>

                        
						
						


					</tr>
					</thead>";
					echo "<tbody>";
					
					$i=0;
					
					while($row = mysqli_fetch_array($rec))
					{
						$i++;
						$court_type_id		        = $row['court_type_id'];
						$case_type_id		        = $row['case_type_id'];
						$case_no		            = $row['case_no'];
						$court_id		            = $row['court_id'];
						$case_status_id		        = $row['case_status_id'];
						$rule_issue_date	        = $row['rule_issue_date'];
						$interim_order_date 	    = $row['interim_order_date'];
						$judgment_date		        = $row['judgment_date'];
						$power_issue_date	        = $row['power_issue_date'];
						$petitioners_name		    = $row['petitioners_name'];
						$respondent_name		    = $row['respondent_name'];
						$case_summary		        = $row['case_summary'];
						$attachment		            = $row['attachment'];
						$interim_order		        = $row['interim_order'];
						$lawyer_id		            = $row['lawyer_id'];
						$judgment_summary		    = $row['judgment_summary'];
						$next_date		            = $row['next_date'];
						$appeal_date		        = $row['appeal_date'];
						$appeal_order		        = $row['appeal_order'];
						$appeal_judgment_date	    = $row['appeal_judgment_date'];
						$appeal_judgment		    = $row['appeal_judgment'];
						$case_details_id            = $row['case_details_id'];


						$court_type = array();
						$sql2 = "select * from court_type";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
						      $court_type[$row2['court_type_id']] = $row2['court_type_name'];
						}


						$court_name = array();
						$sql3= "select * from court_info";
						$result3 = $conn->query($sql3);
						while($row2 = mysqli_fetch_array($result3))
						{
							$court_name[$row2['court_id']] = $row2['court_name'];
						}

						$judge_name = array();
						$sql4= "select * from court_info";
						$result4 = $conn->query($sql4);
						while($row2 = mysqli_fetch_array($result4))
						{
							$judge_name[$row2['court_id']] = $row2['justice_name'];
						}

						$case_type_name = array();
						$sql5= "select * from case_type";
						$result5 = $conn->query($sql5);
						while($row2 = mysqli_fetch_array($result5))
						{
							$case_type_name[$row2['case_type_id']] = $row2['case_type_name'];
						}

						$case_status_name = array();
						$sql6= "select * from case_status";
						$result6 = $conn->query($sql6);
						while($row2 = mysqli_fetch_array($result6))
						{
							$case_status_name[$row2['case_status_id']] = $row2['case_status_name'];
						}


						$layer_name = array();
						$sql7= "select * from lawyer_info";
						$result7 = $conn->query($sql7);
						while($row2 = mysqli_fetch_array($result7))
						{
							$layer_name[$row2['lawyer_id']] = $row2['lawyer_name'];
						}

						
						
						echo "<tr>
						<td>$i</td>
						<td>$court_type[$court_type_id]</td>
						<td>$court_name[$court_id]</td>
						<td>$judge_name[$court_id]</td>
						<td>$case_type_name[$case_type_id]</td>
						<td>$case_no</td>
						<td>$case_status_name[$case_status_id]</td>
						<td>$layer_name[$lawyer_id]</td>
						<td>$case_summary</td>
						<td>$petitioners_name</td>
						<td>$respondent_name</td>


                                                

						
						
                   <td>
							<a href='case_details_edit.php?case_details_id=$case_details_id' class='button2'>Update</a>
							<a href='case_details_view.php?case_details_id=$case_details_id' class='btn btn-primary'>View</a>
							
						   <a href ='$_SERVER[SCRIPT_NAME]?case_details_id=$case_details_id'
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
