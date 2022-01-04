<?php

include('connection.php');

  session_start();
  if(empty($_SESSION['uid']))
  {
    header("location:login.php");
  }
  
  
 function queryRunner($query){
     $result=mysql_query($query) OR die(mysql_error());
     return $result;
    }
    
function countRow($result){
    
      return mysql_num_rows($result);
    }
    
function rowRetriever($result){
    
      return mysql_fetch_assoc($result);
    }
    
function rowRetrieverObject($result){

  return mysql_fetch_object($result);
} 
    
function findLastInsertId(){

      return mysql_insert_id();
    }

function simplifySpecialCharacter($data){

      return mysql_real_escape_string($data);
    }


?>

<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-fileupload.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->

                <div class="page-title sidebar-title">
                    <h5>Kareem</h5>
                </div>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    
                    <li <?php if(!empty($Dashboard)) echo "class='active'"; ?>>
                        <a href="index.php"> <!--<i class="menu-icon fa fa-dashboard circle-text-red"></i>-->Dashboard </a>
                    </li>
                    
                    <li <?php if(!empty($earning)) echo "class='active'"; ?>>
                        <a href="earning.php"> <!--<i class="menu-icon fa fa-dashboard circle-text-red"></i>-->Earning </a>
                    </li>
                    
                    <li <?php if(!empty($country) || !empty($country_insert) || !empty($country_edit)) echo "class='active'"; ?>>
                        <a href="country.php"> <!--<i class="menu-icon fa fa-plus circle-text-orange"></i>-->All Countries</a>
                    </li>
                    
                    <li <?php if(!empty($ride_category) || !empty($ride_category_insert) || !empty($ride_category_edit)) echo "class='active'"; ?>>
                        <a href="ride-category.php"> <!--<i class="menu-icon fa fa-user-circle-o circle-text-lightblue">--></i>Ride Category</a>
                    </li>
                    
                    <li <?php if(!empty($artist) || !empty($artist_insert) || !empty($artist_edit)) echo "class='active'"; ?>>
                        <a href="payment-method.php"> <!--<i class="menu-icon fa fa-user-circle-o circle-text-lightblue">--></i>Payment Methods</a>
                    </li>
                    
                    <li <?php if(!empty($city) || !empty($city_insert) || !empty($city_edit)) ?> class="menu-item-has-children dropdown">
                        <a href="city.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->Supported Cities</a>
                        
                        <ul class="sub-menu children dropdown-menu">
									<?php
										
								        $query1=queryRunner("Select * from Country Where enable = '0' ");
	                                    while($row1=rowRetriever($query1))
	                                    {
	                                    	?>
	                                            <li>

	                                            	<a href="city.php?id=<?php echo $row1['id'];?>&name=<?php echo $row1['name'];?>">
	                                            	    <?php echo $row1['name'];?>
	                                            	    
	                                            	</a>
	                                                
	                                            </li>
	                                        <?php
	                                    }
										
									?>
									
								</ul>
								
								
                    </li>
                    
                    <li <?php if(!empty($ride_type) || !empty($ride_type_insert) || !empty($ride_type_edit)) ?> class="menu-item-has-children dropdown">
                        <a href="ride-typ.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->All Ride Types</a>
                        
                        <ul class="sub-menu children dropdown-menu">
									<?php
										
								        $query1=queryRunner("Select * from Country Where enable = '0' ");
	                                    while($row1=rowRetriever($query1))
	                                    {
	                                    	?>
	                                            <li>

	                                            	<a href="ride-type.php?id=<?php echo $row1['id'];?>&name=<?php echo $row1['name'];?>">
	                                            	    <?php echo $row1['name'];?>
	                                            	    
	                                            	</a>
	                                                
	                                            </li>
	                                        <?php
	                                    }
										
									?>
									
								</ul>
								
								
                    </li>
                    
                    <li <?php if(!empty($payment) || !empty($payment_insert) || !empty($payment_edit)) ?> class="menu-item-has-children dropdown">
                        <a href="payment.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->Supported Payments</a>
                        
                        <ul class="sub-menu children dropdown-menu">
									<?php
										
								        $query1=queryRunner("Select * from Country Where enable = '0' ");
	                                    while($row1=rowRetriever($query1))
	                                    {
	                                    	?>
	                                            <li>

	                                            	<a href="payment.php?id=<?php echo $row1['id'];?>&name=<?php echo $row1['name'];?>">
	                                            	    <?php echo $row1['name'];?>
	                                            	    
	                                            	</a>
	                                                
	                                            </li>
	                                        <?php
	                                    }
										
									?>
									
								</ul>
								
								
                    </li>
                    
                    <li <?php if(!empty($coupon) || !empty($coupon_insert) || !empty($coupon_edit)) ?> class="menu-item-has-children dropdown">
                        <a href="coupon.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->All Coupons</a>
                        
                        <ul class="sub-menu children dropdown-menu">
									<?php
										
								        $query1=queryRunner("Select * from Country Where enable = '0' ");
	                                    while($row1=rowRetriever($query1))
	                                    {
	                                    	?>
	                                            <li>

	                                            	<a href="coupon.php?id=<?php echo $row1['id'];?>&name=<?php echo $row1['name'];?>">
	                                            	    <?php echo $row1['name'];?>
	                                            	    
	                                            	</a>
	                                                
	                                            </li>
	                                        <?php
	                                    }
										
									?>
									
								</ul>
								
								
                    </li>
                    
                    <li <?php if(!empty($report)) echo "class='active'"; ?>>
                        <a href="report.php"> <!--<i class="menu-icon fa fa-heart circle-text-orange"></i>-->All Reports</a>
                    </li>
                    
                    <li <?php if(!empty($rider) || !empty($coupon_insert) || !empty($coupon_edit)) ?> class="menu-item-has-children dropdown">
                        <a href="rider.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->All Captains</a>
                        
                        <ul class="sub-menu children dropdown-menu">
                              <li>
									<a href="rider.php?type=approve">Approved Captains</a>
									<a href="rider.php?type=new">New Captains</a>
						      </li>			
						</ul>
								
								
                    </li>
                    
                    
                    <!--<li <?php if(!empty($videos)) echo "class='active'"; ?>>
                        <a href="videos.php"> <i class="menu-icon fa fa-video-camera circle-text-yellow"></i>Live Channels</a>
                    </li>-->
                    
                  
                    
                    <!--<li <?php if(!empty($rider)) echo "class='active'"; ?>>
                        <a href="rider.php"> <i class="menu-icon fa fa-motorcycle circle-text-lightblue"></i>All Rider</a>
                    </li>-->
                    
                    <li <?php if(!empty($order)) ?> class="menu-item-has-children dropdown">
                        <a href="posts.php"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--<i class="menu-icon fa fa-pencil circle-text-yellow"></i>-->All Trips</a>
                         <ul class="sub-menu children dropdown-menu">
                             <li>
                                 <a href="orders.php?action=pending">Running Trips</a>
                                 <a href="orders.php?action=completed">Completed Trips</a>
                                 <a href="orders.php?action=cancel">Cancel Trips</a>
                                 <a href="orders.php?action=schedule">Schedule Trips</a>
                            </li>
                         </ul>    
                    </li>
                    
                    <li <?php if(!empty($comments)) echo "class='active'"; ?>>
                        <a href="comments.php"> <!--<i class="menu-icon fa fa-commenting circle-text-lightblue"></i>-->All Comments</a>
                    </li>
                    
                   <!--
                    
                    <li <?php if(!empty($report)) echo "class='active'"; ?>>
                        <a href="reports.php"> <i class="menu-icon fa fa-comments circle-text-orange"></i>Reports</a>
                    </li>-->
                    
                    <li <?php if(!empty($policy)) echo "class='active'"; ?>>
                        <a href="policy.php"> <!--<i class="menu-icon fa fa-shield circle-text-green"></i>-->Privacy Policy</a>
                    </li>
                    
                   
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->