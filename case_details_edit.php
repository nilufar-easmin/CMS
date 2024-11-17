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
            $case_status_id		      = $row['case_status_id'];
            $rule_issue_date	      = $row['rule_issue_date'];
            $interim_order_date 	  = $row['interim_order_date'];
            $judgment_date		      = $row['judgment_date'];
            $power_issue_date	      = $row['power_issue_date'];
            $petitioners_name		    = $row['petitioners_name'];
            $respondent_name		    = $row['respondent_name'];
            $case_summary		        = $row['case_summary'];
            $attachment		          = $row['attachment'];
            $interim_order		      = $row['interim_order'];
            $lawyer_id		          = $row['lawyer_id'];
            $judgment_summary		    = $row['judgment_summary'];
            $next_date		          = $row['next_date'];
            $appeal_date		        = $row['appeal_date'];
            $appeal_order		        = $row['appeal_order'];
            $appeal_judgment_date	  = $row['appeal_judgment_date'];
            $appeal_judgment		    = $row['appeal_judgment'];
            $case_details_id        = $row['case_details_id'];
		}
	}
	
	if(isset($_POST['update']))
	{ 
        $court_type_id		      = $_POST['court_type_id'];
        $case_type_id		        = $_POST['case_type_id'];
        $case_no		            = $_POST['case_no'];
        $court_id		            = $_POST['court_id'];
        $case_status_id		      = $_POST['case_status_id'];
        $rule_issue_date	      = $_POST['rule_issue_date'];
        $interim_order_date 	  = $_POST['interim_order_date'];
        $judgment_date		      = $_POST['judgment_date'];
        $power_issue_date	      = $_POST['power_issue_date'];
        $petitioners_name		    = $_POST['petitioners_name'];
        $respondent_name		    = $_POST['respondent_name'];
        $case_summary		        = $_POST['case_summary'];
        $attachment		          = $_POST['attachment'];
        $interim_order		      = $_POST['interim_order'];
        $lawyer_id		          = $_POST['lawyer_id'];
        $judgment_summary		    = $_POST['judgment_summary'];
        $next_date		          = $_POST['next_date'];
        $appeal_date		        = $_POST['appeal_date'];
        $appeal_order		        = $_POST['appeal_order'];
        $appeal_judgment_date	  = $_POST['appeal_judgment_date'];
        $appeal_judgment		    = $_POST['appeal_judgment'];
        $case_details_id        = $_POST['case_details_id'];
		
	$sql = "update case_details set court_type_id='$court_type_id',case_type_id='$case_type_id',case_no	='$case_no',
    court_id='$court_id',case_status_id	='$case_status_id',rule_issue_date='$rule_issue_date',interim_order_date='$interim_order_date',
    judgment_date='$judgment_date',power_issue_date	='$power_issue_date',petitioners_name='$petitioners_name',respondent_name='$respondent_name',
    case_summary='$case_summary',attachment	='$attachment',interim_order='$interim_order',lawyer_id	='$lawyer_id',
    judgment_summary='$judgment_summary',next_date='$next_date',appeal_date='$appeal_date',appeal_order	='$appeal_order',
    appeal_judgment_date='$appeal_judgment_date', appeal_judgment='$appeal_judgment' where case_details_id=$case_details_id";
    
		
		$result = $conn->query($sql);
		
		if($result)
		{
			echo "Update Successfully!";
			echo "<meta http-equiv='refresh' content='1;url=case_details_list_view.php'>";
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
        <h3>Update Case Details</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             
              <form class="form-horizontal style-form" action="case_details_edit.php" method="post">

              <?php
 
              if($court_type_id <=2)
              {
                $dis = "disabled";
              }else{
                $dis = "enabled";
              }


              ?>



              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Court Type Name</label>
                  <div class="col-sm-6">
                  <select name="court_type_id" id="court_type_id" onClick="change_fuc();" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_type_list as $key => $value)
                        {
                          if ($court_type_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                          
                        }
                      ?>
                  </select>
                  </div>
                </div>


                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">Court Name</label>
                  <div class="col-sm-6">
                  <select name="court_id" id="court_name" style="height:30px; width:600px;" <?php echo $dis; ?>>
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($court_name_list as $key => $value)
                        {
                          if ($court_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                        }
                      ?>
                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Justice Name</label>
                  <div class="col-sm-6">
                  <select name="court_id" id="justice_name" style="height:30px; width:600px;" <?php echo $dis; ?>>
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($justice_name_list as $key => $value)
                        {
                          if ($court_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
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
                          if ($case_type_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                        }
                      ?>
                   </select>
                   </div>
                </div>

                

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case No</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_no" value="<?php  echo $case_no; ?>" class="form-control">
                  </div>
                </div>


                  

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">case Summary</label>
                  <div class="col-sm-6">
                    <input type="text" name="case_summary" value="<?php  echo $case_summary; ?>" class="form-control">
                  </div>
                </div>
                  
                  
                  
                  
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Petitioners Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="petitioners_name" value="<?php  echo $petitioners_name; ?>" class="form-control">
                  </div>
                </div>
          

                  

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Respondent Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="respondent_name" value="<?php  echo $respondent_name; ?>" class="form-control">
                  </div>
                </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Rule Issue Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="rule_issue_date" value="<?php echo $rule_issue_date; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Attachment</label>
                  <div class="col-sm-6">
                    <input type="file" name="attachment"  value="<?php echo $attachment; ?>" class="form-control">
                  </div>
                </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Interim  Order Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="interim_order_date" value="<?php echo $interim_order_date; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Interim Order</label>
                  <div class="col-sm-6">
                    <input type="text" name="interim_order" value="<?php echo $interim_order; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lawyer Name</label>
                  <div class="col-sm-6">
                  <select name="lawyer_id" id="lawyer_id" style="height:30px; width:600px;;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($lawyer_list as $key => $value)
                        {
                          if ($lawyer_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                        }
                      ?>
                   </select>
                   </div>
                   </div>


                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Power Issue Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="power_issue_date" value="<?php echo $power_issue_date; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Case Status Name</label>
                  <div class="col-sm-6">
                  <select name="case_status_id" id="case_status_id" style="height:30px; width:600px;">
                    <option value='0'>------------Select Any Option----------------</option>
                      <?php
                        foreach($case_status_type_list as $key => $value)
                        {
                          if ($case_status_id==$key) 
                          {
                            echo "<option value='$key' selected>$value</option>";
                          } 
                          else{
                            echo "<option value='$key'>$value</option>";
                          }
                        }
                      ?>
                  </select>
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Next Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="next_date" value="<?php echo $next_date; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Judgement Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="judgment_date" value="<?php echo $judgment_date; ?>" class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Judgement Summary</label>
                  <div class="col-sm-6">
                    <input type="text" name="judgment_summary" value="<?php echo $judgment_summary; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="appeal_date" value="<?php echo $appeal_date; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Order</label>
                  <div class="col-sm-6">
                    <input type="text" name="appeal_order"  value="<?php echo $appeal_order; ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal  Judgment Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="appeal_judgment_date"  value="<?php echo $appeal_judgment_date; ?>"  class="form-control">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Appeal Judgment</label>
                  <div class="col-sm-6">
                    <input type="text" name="appeal_judgment" value="<?php echo $appeal_judgment; ?>" class="form-control">

                  </div>
                  </div>
               

				<div class="form-group">
                  <div class="col-sm-8" align="center">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
					
					<input type="hidden" name="case_details_id" value="<?php echo $case_details_id;  ?>" class="btn btn-info">
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

      
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  
  <?php   include('footer_resources.php');  ?>

</body>

</html>
