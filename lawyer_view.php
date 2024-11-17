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
		$lawyer_id  = $_GET['lawyer_id'];
		$sql = "select * from  lawyer_info where lawyer_id = '$lawyer_id'";
		$result = $conn->query($sql);
		if($row = mysqli_fetch_array($result))
		{
			                $lawyer_name		  = $row['lawyer_name'];
					      	$lawyer_email 	      = $row['lawyer_email'];
					        $Phone_no	          = $row['Phone_no'];
                            $lawyer_type	      = $row['lawyer_type'];
					       	$lawyer_id 	    	  = $row['lawyer_id'];
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
			<div class="div1">Lawyer View</div>
			
		</div>
		<?php
						$lawyer_name = array();
						$sql2 = "select * from lawyer_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$lawyer_name[$row2['lawyer_id']] = $row2['lawyer_name'];
						}


                        $lawyer_email = array();
						$sql2 = "select * from lawyer_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$lawyer_email[$row2['lawyer_id']] = $row2['lawyer_email'];
						}


                        $Phone_no = array();
						$sql2 = "select * from lawyer_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$Phone_no[$row2['lawyer_id']] = $row2['Phone_no'];
						}


                        $lawyer_type = array();
						$sql2 = "select * from lawyer_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$lawyer_type[$row2['lawyer_id']] = $row2['lawyer_type'];
						}


		?>
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
				<div>
					<table border="1" width="100%" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
                    <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Lawyer Name :</th>
							<td style="color:#000000"><?php  echo  $lawyer_name[$lawyer_id];  ?></td>
						</tr>

                        <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Lawyer Email :</th>
							<td style="color:#000000"><?php  echo  $lawyer_email[$lawyer_id];  ?></td>
						</tr>

                        <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Phone No :</th>
							<td style="color:#000000"><?php  echo  $Phone_no[$lawyer_id];  ?></td>
						</tr>

                        <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Lawyer Type:</th>
							<td style="color:#000000"><?php  echo  $lawyer_type[$lawyer_id];  ?></td>
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
