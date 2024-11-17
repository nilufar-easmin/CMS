
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
		
		
		if(isset($_GET['court_id']))
				{
					$court_id = $_GET['court_id'];
					$sql = "select * from court_info where court_id = '$court_id'";
					$result = $conn->query($sql);
					if($row = mysqli_fetch_array($result))
					{
				        $court_type_id	 		= $row['court_type_id'];
						$justice_name 		    = $row['justice_name'];
				        $court_name 		    = $row['court_name'];
					    $court_id	 		    = $row['court_id'];
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
						$court_type = array();
						$sql2 = "select * from court_type";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$court_type[$row2['court_type_id']] = $row2['court_type_name'];
						}



						$justice_name = array();
						$sql2= "select * from court_info";
						$result= $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result))
						{
							$justice_name[$row2['court_id']] = $row2['justice_name'];
						}



                        $court_name = array();
						$sql2 = "select * from court_info";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$court_name[$row2['court_id']] = $row2['court_name'];
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
							<th width="200px" style="text-align:center">Justice Name:</th>
							<td style="color:#000000"><?php  echo  $justice_name[$court_id];  ?></td>
						</tr>

                        <tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Court Name :</th>
							<td style="color:#000000"><?php  echo  $court_name[$court_id];  ?></td>
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
