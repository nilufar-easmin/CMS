<!DOCTYPE html>
<html lang="en">

<?php

	include('connection.php');

    include('function.php');


  $court_type_list          = court_type_list();
  $case_type_list           = case_type_list();
  $case_status_type_list    = case_status_type_list();
  $lawyer_list              =lawyer_list();
  $court_name_list          =court_name_list();
  $justice_name_list        =justice_name_list();
	
	if(isset($_POST['save']))
	{

    $court_type_id		    = $_POST['court_type_id'];
    $case_type_id		      = $_POST['case_type_id'];
    $case_no		          = $_POST['case_no'];
    $court_id		          = $_POST['court_id'];
    $case_status_id		    = $_POST['case_status_id'];
    $rule_issue_date	    = $_POST['rule_issue_date'];
    $interim_order_date 	= $_POST['interim_order_date'];
    $judgment_date		    = $_POST['judgment_date'];
    $power_issue_date	    = $_POST['power_issue_date'];
    $petitioners_name		  = $_POST['petitioners_name'];
    $respondent_name		  = $_POST['respondent_name'];
    $case_summary		      = $_POST['case_summary'];
    $attachment		        = $_POST['attachment'];
    $interim_order		    = $_POST['interim_order'];
    $lawyer_id		        = $_POST['lawyer_id'];
    $judgment_summary		  = $_POST['judgment_summary'];
    $next_date		        = $_POST['next_date'];
    $appeal_date		      = $_POST['appeal_date'];
    $appeal_order		      = $_POST['appeal_order'];
    $appeal_judgment_date	= $_POST['appeal_judgment_date'];
    $appeal_judgment			= $_POST['appeal_judgment'];

    // Handling file upload
    $attachment = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $upload_dir = 'uploads/'; // Make sure this directory exists and is writable
        $upload_file = $upload_dir . basename($_FILES['attachment']['name']);
        $file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

        // Validate file type (e.g., allow only certain types of images)
        if (in_array($file_type, ['jpg', 'pdf', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $upload_file)) {
                $attachment = basename($_FILES['attachment']['name']);
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    }


   
   

$sql = "insert into  case_details (court_type_id, case_type_id, case_no, court_id, case_status_id, rule_issue_date, interim_order_date,
        judgment_date, power_issue_date, petitioners_name,respondent_name,case_summary,attachment,interim_order,
        lawyer_id,judgment_summary,next_date,Appeal_date,Appeal_order,appeal_judgment_date,appeal_judgment) values 
        ('$court_type_id','$case_type_id','$case_no','$court_id','$case_status_id','$rule_issue_date','$interim_order_date',
        '$judgment_date','$power_issue_date','$petitioners_name','$respondent_name','$case_summary','$attachment',
        '$interim_order','$lawyer_id','$judgment_summary','$next_date','$appeal_date','$appeal_order','$appeal_judgment_date','$appeal_judgment')";
	//echo 	$sql;
  //die;
		$result = $conn->query($sql);
		
		if($result == 1)
		{
			echo "Successfully Inserted!";
			header("Location:case_details_list_view.php");
		}
	}
?>

<head>
  <?php  include('header_resources.php');   ?>
</head>

<body>
  <section id="container">
  
  	<?php
		
		include('header.php');
		
		include('nav.php');
	
	
	?>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3> Case Details Information</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="case_details_info.php" method="post" enctype="multipart/form-data">


            


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Type Name</label>
                  <div class="col-sm-6">
                  <select name="court_type_id" id="court_type_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_type_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Name</label>
                  <div class="col-sm-6">
                  <select name="court_id" id="court_name" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_name_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Justice Name</label>
                  <div class="col-sm-6">
                  <select name="court_id" id="justice_name" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($justice_name_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>

                


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Type Name</label>
                  <div class="col-sm-6">
                  <select name="case_type_id" id="case_type_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($case_type_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case No</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_no" class="form-control">
                  </div>
                  </div>


                
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Summary</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_summary" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Petitioners Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="petitioners_name" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Respondent name</label>
                  <div class="col-sm-6">
                    <input type="text" name="respondent_name" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Rule Issue Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="rule_issue_date" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Attachment</label>
                  <div class="col-sm-6">
                    <input type="file" name="attachment" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Interim Order Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="interim_order_date" class="form-control">
                  </div>
                  </div>



                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Interim Order</label>
                  <div class="col-sm-6">
                    <input type="text" name="interim_order" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Name</label>
                  <div class="col-sm-6">
                  <select name="lawyer_id" id="lawyer_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($lawyer_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Power Issue Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="power_issue_date" class="form-control">
                  </div>
                  </div>



                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Status Name</label>
                  <div class="col-sm-6">
                  <select name="case_status_id" id="case_status_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($case_status_type_list as $key => $value)
                        {
                          echo "<option value='$key'>$value</option>";
                        }
                      ?>
                  </select>
                  </div>
                </div>

              

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Next Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="next_date" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Judgement Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="judgment_date" class="form-control">
                  </div>
                  </div>

                  

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Judgement Summary</label>
                  <div class="col-sm-6">
                    <input type="text" name="judgment_summary" class="form-control">
                  </div>
                  </div>

                 


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="appeal_date" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Order</label>
                  <div class="col-sm-6">
                    <input type="text" name="appeal_order" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Judgment Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="appeal_judgment_date" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Judgment</label>
                  <div class="col-sm-6">
                    <input type="text" name="appeal_judgment" class="form-control">
                  </div>
                  </div>



               


				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="save" class="btn btn-info">
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        
          
      
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  
  <?php   include('footer_resources.php');  ?>

</body>

<script>
    function change_fuc()
    {
      const myElement = document.getElementById("court_type_id").value;
      if(myElement == 1 || myElement == 2)
      {
        document.getElementById("court_name").disabled = true;
        document.getElementById("justice_name").disabled = false;
        document.getElementById("court_name").value = "";
      }else{
        document.getElementById("justice_name").disabled = true;
        document.getElementById("court_name").disabled = false;
        document.getElementById("justice_name").value = "";
      }
      
      //alert(myElement);
    }

    

  </script>

</html>
