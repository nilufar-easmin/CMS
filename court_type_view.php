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
		
		
		if(isset($_GET['court_type_id']))
		{
		  $court_type_id = $_GET['court_type_id'];
		  $sql = "select * from  court_type where court_type_id  = '$court_type_id'";
		  $result = $conn->query($sql);
		  if($row = mysqli_fetch_array($result))
				{
				  $court_type_name 		    = $row['court_type_name'];
				  $court_type_id  		    = $row['court_type_id'];
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
			<div class="div1">Court Type View</div>
			
		</div>
		<?php
						$court_type_name = array();
						$sql2 = "select * from  court_type";
						$result2 = $conn->query($sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$court_type_name[$row2['court_type_id']] = $row2['court_type_name'];
						}

		?>
        
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
				<div>
					<table border="1" width="100%" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
					<tr style="height:50px;color:#000000">
							<th width="200px" style="text-align:center">Court Type Name :</th>
							<td style="color:#000000"><?php  echo  $court_type_name[$court_type_id];  ?></td>
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
