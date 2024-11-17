<?php
// dashboard.php
include('connection.php');
session_start();

// Query to count pending cases
$query_pending = "
    SELECT COUNT(cd.case_details_id) as pending_count
    FROM case_details cd
    JOIN case_status cs ON cd.case_status_id = cs.case_status_id
    WHERE cs.case_status_name = 'Pending'
";
$result_pending = mysqli_query($conn, $query_pending);
$pending_cases = mysqli_fetch_assoc($result_pending)['pending_count'];

// Query to count total cases
$query_total = "
    SELECT COUNT(case_details_id) as total_count
    FROM case_details
";
$result_total = mysqli_query($conn, $query_total);
$total_cases = mysqli_fetch_assoc($result_total)['total_count'];

// Query to count disposed cases
$query_disposed = "
    SELECT COUNT(cd.case_details_id) as disposed_count
    FROM case_details cd
    JOIN case_status cs ON cd.case_status_id = cs.case_status_id
    WHERE cs.case_status_name = 'Disposed'
";
$result_disposed = mysqli_query($conn, $query_disposed);
$disposed_cases = mysqli_fetch_assoc($result_disposed)['disposed_count'];

// Query to count total lawyers
$query_lawyers = "
    SELECT COUNT(lawyer_id) as total_lawyers
    FROM lawyer_info
";
$result_lawyers = mysqli_query($conn, $query_lawyers);
$total_lawyers = mysqli_fetch_assoc($result_lawyers)['total_lawyers'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('header_resources.php'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body{
      background: url(./images/login.jpg) repeat fixed 0 0 #fff;
      background-size: cover;
      background-position: center;
    }
    
    .card {
      background: #4ECDC4;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 20px 0;
      display: flex;
      align-items: center;
      justify-content: space-between; 
      width: 400px;
     
    }

    .card-icon {
      font-size: 3rem;
      color: #f59e0b;
    }

    .card-content {
      flex-grow: 1;
      margin-left: 20px;
    }

    .card-content h5 {
      margin: 0;
      font-size: 1.5rem;
      color:white;
    }

    .card-content p {
      font-size: 2rem;
      font-weight: 700;
      color:white;
      margin: 0;
    }
    .welcome{
      color:black;
      font-weight:bold;
    }
    
  </style>
</head>

<body>
  <section id="container">
    <?php
    include('header.php');
    include('nav.php');
    ?>

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

      <h2 class="welcome"> Welcome to Case Management System</h2>
        <!-- Cards for Cases and Lawyers -->
        <div class="row">
          <!-- Card for Pending Cases -->
          <div class="col-md-6">
            <div class="card">
              <i class="fas fa-balance-scale card-icon"></i>
              <div class="card-content">
                <h5 class=>Pending Cases</h5>
                <p><?php echo $pending_cases; ?></p>
              </div>
            </div>
          </div>

         

          <!-- Card for Disposed Cases -->
          <div class="col-md-6">
            <div class="card">
              <i class="fas fa-check-circle card-icon"></i>
              <div class="card-content">
                <h5>Disposed Cases</h5>
                <p><?php echo $disposed_cases; ?></p>
              </div>
            </div>
          </div>


 <!-- Card for Total Cases -->
 <div class="col-md-6">
            <div class="card">
              <i class="fas fa-folder card-icon"></i>
              <div class="card-content">
                <h5>Total Cases</h5>
                <p><?php echo $total_cases; ?></p>
              </div>
            </div>
          </div>



          <!-- Card for Total Lawyers -->
          <div class="col-md-6">
            <div class="card">
              <i class="fas fa-user-tie card-icon"></i>
              <div class="card-content">
                <h5>Total Lawyers</h5>
                <p><?php echo $total_lawyers; ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- /row -->

      </section>
    </section>
    <!--main content end-->

  </section>

  <?php include('footer_resources.php'); ?>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>