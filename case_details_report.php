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
		
		include('function.php');
		
		$court_type_list          = court_type_list();
		$case_no_list             = case_no_list();
		
	
	?>
	
	<style>
		body{
      background: url(./images/Dashboard.jpg) repeat fixed 0 0 #fff;
      background-size: cover;
      background-position: center;
    }
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
		
		.button1 {
			background-color:darkblue; /* Green */
			border: none;
			color: white;
			padding: 5px 8px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 2px 2px;
			cursor: pointer;
			border-radius: 4px;
		}
		
		.button2 
		{
			background-color: #f44336; /* Red */
			border: none;
			color: white;
			padding: 3px 6px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 13px;
			margin: 2px 2px;
			cursor: pointer;
			border-radius: 4px;
		}
	
	
	</style>
	
	<script>
		function print(parameter)
		{

			  var prtContent = document.getElementById(parameter).innerHTML;
			  var WinPrint = window.open('', '', 'left=0,top=0,width=1200,height=900,toolbar=0,scrollbars=0,status=0');
			  WinPrint.document.write(prtContent);
			  WinPrint.document.close();
			  WinPrint.focus();
			  WinPrint.print();
			  WinPrint.close();

		}
	
	</script>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
	  
	  	<div>
			<div class="div1">Case Details Report</div>
		</div>
		
		<?php
		
			echo "<table border='0' cellspacing='1' align='center'>";
			echo "<form action='$_SERVER[SCRIPT_NAME]' method='post'>
				<tr bgcolor='#87CEFA'>
					
					<td style='width:150px;color:white;'>&nbsp;&nbsp;&nbsp;Court Type :</td>
					<td>
						<select class='form-control' name='court_type_id' style='width:200px;' required>
						<option value=''>------Select Court Type-------</option>";
			
						foreach($court_type_list as $key=>$value) {
							echo "<option value='$key'>$value</option>";
						}
			
						echo "</select>
					</td>

					<td style='width:150px;color:white;'>&nbsp;&nbsp;&nbsp;Case No :</td>
					<td>
						<select class='form-control' name='case_number' style='width:200px;'>
						<option value='0'>------Select Case No-------</option>";
			
						foreach($case_no_list as $key=>$value) {
							echo "<option value='$key'>$value</option>";
						}
			
						echo "</select>
					</td>
					
					<td style='width:100px;color:white;'>&nbsp;&nbsp;&nbsp;Date From :</td>
					<td>
						<input type='date' name='date_from' />
					</td>
					
					<td style='width:100px; color:white;'>&nbsp;&nbsp;&nbsp;Date To :</td>
					<td>
						<input type='date' name='date_to' />
					</td>
					
					
					<td><input style='margin:4px 10px;'bgcolor='#87EEFA' class='button1' type='submit' name='generate_report' value='Generate Report'></td>
					</tr>
					<tr style='height:20px;'></tr>			
			
					</form>";
			echo "</table>";
			
			if(isset($_POST['generate_report'])) {
				$court_type_id 	= $_POST['court_type_id'];
				$date_from 		= $_POST['date_from'];
				$date_to 		= $_POST['date_to'];
				$case_number 	= $_POST['case_number'];
				
				//$sql = "SELECT * FROM case_details where next_date between '$date_from' and '$date_to'";
				$sql = "SELECT * FROM case_details where court_type_id  = $court_type_id";
				
				if(!empty($date_from) && !empty($date_to)) $sql .= " and next_date between '$date_from' and '$date_to'";
				if(!empty($case_number)) $sql .= " and case_details_id  = $case_number";
				
				
				//echo $sql; die;
				
				$record =  $conn->query($sql);
				
				echo "<body>";
				
					echo "<div style='text-align:center;'>
						<button class='button2' onclick=\"print('report_content')\">Print</button>			
					</div><br>";
					
				echo "<div id='report_content'>";
				
					echo "<table border='1' cellspacing='0' cellpadding='0' align='center'>";
						echo "<tr><td colspan='12' style='height:30px; text-align:center; font-weight:bold; background-color:#87CEFA;'>Case Monitoring Report</td></tr>";
						
						echo "<tr bgcolor='#F0E68C' style='height:30px; font-weight:bold;'>
							<td style='width:60px; text-align:center'>SL No.</td>
							<td style='width:250px; text-align:center'>Court Type</td>
							<td style='width:250px; text-align:center'>Case Type</td>
							<td style='width:250px; text-align:center'>Case No.</td>
							<td style='width:250px; text-align:center'>Petitioners Name</td>
							<td style='width:250px; text-align:center'>Respondent Name</td>
							<td style='width:250px; text-align:center'>Case Summary</td>
							<td style='width:250px; text-align:center'>Interim Order</td>
							<td style='width:250px; text-align:center'>Assigned Lawyer</td>
							<td style='width:250px; text-align:center'>Case Status</td>
							<td style='width:250px; text-align:center'>Next Date</td>
							
						</tr>";
						
						$i=0;
						
						
						
						
						while($row = mysqli_fetch_array($record))
						{
							$court_type_id 		= $row['court_type_id'];
							$case_type_id 		= $row['case_type_id'];
							$case_details_id    = $row['case_details_id'];
							$case_status_id     = $row['case_status_id'];
							$lawyer_id          = $row['lawyer_id'];
							$next_date = $row['next_date'];
							


							$court_type = array();
							$sql2 = "select * from court_type";
							$result2 = $conn->query($sql2);
							while($row2 = mysqli_fetch_array($result2))
							{
								$court_type[$row2['court_type_id']] = $row2['court_type_name'];
							}

							$case_type_name = array();
							$sql5= "select * from case_type";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$case_type_name[$row2['case_type_id']] = $row2['case_type_name'];
							}

							$case_no = array();
							$sql5= "select * from case_details";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$case_no[$row2['case_details_id']] = $row2['case_no'];
							}

							$petitioners_name = array();
							$sql5= "select * from case_details";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$petitioners_name[$row2['case_details_id']] = $row2['petitioners_name'];
							}
						    
							$respondent_name = array();
							$sql5= "select * from case_details";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$respondent_name[$row2['case_details_id']] = $row2['respondent_name'];
							}

							$case_summary = array();
							$sql5= "select * from case_details";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$case_summary[$row2['case_details_id']] = $row2['case_summary'];
							}

							$interim_order = array();
							$sql5= "select * from case_details";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$interim_order[$row2['case_details_id']] = $row2['interim_order'];
							}


							$lawyer_name = array();
							$sql5= "select * from lawyer_info";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$lawyer_name[$row2['lawyer_id']] = $row2['lawyer_name'];
							}

							
							$case_status_name = array();
							$sql5= "select * from case_status";
							$result5 = $conn->query($sql5);
							while($row2 = mysqli_fetch_array($result5))
							{
								$case_status_name[$row2['case_status_id']] = $row2['case_status_name'];
							}

							
							
							$i++;
							echo "<tr bgcolor='#F4F4F4'>
								<td style='text-align:center'>$i</td>
								<td style='text-align:left'>$court_type[$court_type_id]</td>
								<td>$case_type_name[$case_type_id]</td>
								<td>$case_no[$case_details_id]</td>
								<td>$petitioners_name[$case_details_id]</td>
								<td>$respondent_name[$case_details_id]</td>
								<td>$case_summary[$case_details_id]</td>
								<td>$interim_order[$case_details_id]</td>
								<td>$lawyer_name[$lawyer_id]</td>
								<td>$case_status_name[$case_status_id]</td>
								<td>$next_date</td>




								
							</tr>";
										
									
									
							
								
										
						}
						
						
					echo "</table>";
				echo "</div>";
				echo "</body>";
			
			}
		?>  
		    
      </section>
    </section>
    
    
    <!--footer end-->
  </section>
  
  <?php   include('footer_resources.php');  ?>
  
</body>

</html>
