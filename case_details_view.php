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
		
		if(isset($_GET['case_details_id']))
	{
		$case_details_id = $_GET['case_details_id'];
		$sql = "select * from case_details where case_details_id = '$case_details_id'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
            $court_type_id		      = $row['court_type_id'];



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
            $case_details_id           = $row['case_details_id'];
		}
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
			<div class="div1">Case Details</div>
			
		</div>
		<?php
						$court_type = array();
						$sql2 = "select * from court_type";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$court_type[$row2['court_type_id']] = $row2['court_type_name'];
						}



						$court_name = array();
						$sql2 = "select * from court_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
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

						

		?>
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
				<div>
					<table border="1" width="100%" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Court Type :</th>
							<td style="color:#000000"><?php  echo  $court_type[$court_type_id];  ?></td>
						</tr>
						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Court Name :</th>
							<td style="color:#000000"><?php  echo  $court_name[$court_id];  ?></td>
						</tr>
						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Judge Name :</th>
							<td style="color:#000000"><?php  echo  $judge_name[$court_id];  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Case Type Name :</th>
							<td style="color:#000000"><?php  echo  $case_type_name[$case_type_id];  ?></td>
						</tr>

                        <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Case No :</th>
							<td style="color:#000000"><?php  echo  $case_no;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Case Summary :</th>
							<td style="color:#000000"><?php  echo  $case_summary;  ?></td>
						</tr>


						
					    <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Petitioners Name :</th>
							<td style="color:#000000"><?php  echo  $petitioners_name;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Respondent Name:</th>
							<td style="color:#000000"><?php  echo  $respondent_name;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Rule Issue date:</th>
							<td style="color:#000000"><?php  echo  $rule_issue_date;  ?></td>
						</tr>
                      

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Attachment:</th>
							<td style="color:#000000"><img src='uploads/<?php echo $attachment; ?>' alt='Employee Photo' height="70px;" width="70px;" class='photo'></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Interim Order date:</th>
							<td style="color:#000000"><?php  echo  $interim_order_date;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Interim Order:</th>
							<td style="color:#000000"><?php  echo  $interim_order;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Lawyer Name:</th>
							<td style="color:#000000"><?php  echo  $lawyer_name[$lawyer_id];  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Power Issue Date:</th>
							<td style="color:#000000"><?php  echo  $power_issue_date;  ?></td>
						</tr>


						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Case Status Name:</th>
							<td style="color:#000000"><?php  echo  $case_status_name[$case_status_id];  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Judgment Date :</th>
							<td style="color:#000000"><?php  echo  $judgment_date;  ?></td>
						</tr>

						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Judgment Summary:</th>
							<td style="color:#000000"><?php  echo  $judgment_summary;  ?></td>
						</tr>


						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Appeal_date:</th>
							<td style="color:#000000"><?php  echo  $appeal_date;  ?></td>
						</tr>



						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Appeal Order:</th>
							<td style="color:#000000"><?php  echo  $appeal_order;  ?></td>
						</tr>

						
						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Appeal Judgment Date:</th>
							<td style="color:#000000"><?php  echo  $appeal_judgment_date;  ?></td>
						</tr>

						<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Appeal Judgment:</th>
							<td style="color:#000000"><?php  echo  $appeal_judgment;  ?></td>
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
