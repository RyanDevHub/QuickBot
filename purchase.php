<?php
error_reporting(0);
require 'inc/db.php';
if(!isset($_SESSION['username'])) { header ('Location: login.php'); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script src="https://embed.selly.gg"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Quick Bot - Purchase</title>

  <!-- Favicons -->


  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link rel="icon" href="qb.png" type="image" sizes="16x16">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Quick<span>Bot</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="qb.png" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION['username']; ?></h5>
          <li class="mt">
            <a class="" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
          <li>
            <a class="active" href="purchase.php">
              <i class="fa fa-shopping-cart"></i>
              <span>Purchase</span>
              </a>
          </li>
          <li>
            <a href="/qb/">
              <i class="fa fa-at"></i>
              <span>QuickBot Panel</span>
              </a>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-lg-9 main-chart">
					<div class="border-head">
						<h3>Dashboard</h3>
					</div>
					<div class="custom-bar-chart">
						<div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5 style="color:d3d3d3";>1 MONTH</h5>
                  </div>
                 <br>
                 <p style="color:#d3d3d3";>Quick Bot Panel Access</p>
                 <br>
                 <p style="color:#d3d3d3";>Unlimited Tweet Boosts</p>
                 </br>
                 <p style="color:#d3d3d3;>Unlimited Tweet Boosts</p><br>
            <p style="color:#d3d3d3;>Likes, Retweets, Comments, and Followers</p>

                  <footer>
                    <div class="pull-left">
                      <b style="color:#d3d3d3" align="center"><i class="fa fa-hdd-o"></i> <a data-selly-product="b388d15e">Purchase</a></b>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div></div>
			  <div class="card mb-4">
					<div class="footer h5"><br><br>
						<h3 class="card-title">Redeem Voucher Code</h3>
<?php
					
	if(isset($_POST['submit']))
	{
		$code = $_POST['voucher'];
        $username = $_SESSION['username'];
        
		$stmt = $con->prepare('SELECT * FROM vouchers WHERE voucher_code = ?');
		$stmt->bind_param('s', $code);
		$stmt->execute();
		$meta = $stmt->result_metadata();
		while ($field = $meta->fetch_field()) {
			$parameters[] = &$row[$field->name];
		}
		call_user_func_array(array($stmt, 'bind_result'), $parameters);
		while ($stmt->fetch()) {
			foreach($row as $key => $val) {
				$x[$key] = $val;
			}
			$results[] = $x;
		}
		
		$check = $row['username'];
		
		if($check == '')
		{
			$duration = $row['duration'];
		
			$sql = "UPDATE `vouchers` SET username = '".$username."' WHERE voucher_code = '".$code."'";
			
			
			$expirydate = date("d/m/Y", strtotime(" +".$duration." months"));

			$sql2 = "UPDATE `customers` SET expiry = '".$expirydate."', status = 3 WHERE username = '".$username."'";
			if(mysqli_query($con, $sql))
			{
				if(mysqli_query($con, $sql2))
				{
					echo "<div class='alert bg-warning' role='alert'><em class='fa fa-check mr-2'></em> Voucher Applied!</div>";	
					$_SESSION['status'] = 3;
				}
			}	
		}
		else {
			
			echo "<div class='alert bg-danger' role='alert'><em class='fa fa-times mr-2'></em> Voucher Invalid!</div>";
		}
	}
	else {?>
										<form action="" method="post">
										
											<div class="input-group">
													<input type="text" id="voucher" name="voucher" class="form-control"><span class="input-group-append">
														<button class="btn btn-primary" id="submit" name="submit" type="submit" data-original-title="" title="">Redeem!</button>
												</span></div>
										
										</form>
										<?php } ?>
									</div>
								</div>
					</div>
				</div>
			</div>
        </section>
	</section>
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Quickbot!',
        // (string | mandatory) the text inside the notification
        text: 'Enjoy your stay!',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
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
