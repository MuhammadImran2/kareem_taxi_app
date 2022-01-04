<?php

      // $sel_qur = "select username from admin where id = '".$_SESSION['uid']."'";
      // $sel_run = mysql_query($sel_qur);
      // $sel_data = mysql_fetch_array($sel_run);

?>

<div class="header-menu">

    <div class="col-sm-7">
        <div class="header-left">
            <div class="page-title">
                <h5>
                    <?php 
                        if(!empty($Dashboard)){
                            echo "Dashboard";   
                        } 
                        else if(!empty($country)){
                            echo "All Countries";  
                        }
                        else if(!empty($country_insert)){
                            echo "Insert Country";  
                        }
                        else if(!empty($country_edit)){
                            echo "Edit Country";  
                        }
                        
                        else if(!empty($category)){
                            echo "All Ride Categories";  
                        }
                        else if(!empty($category_insert)){
                            echo "Add Ride Category";  
                        }
                        else if(!empty($category_edit)){
                            echo "Edit Ride Category";  
                        } 
                        
                        else if(!empty($payment_method)){
                            echo "All Payment Method";  
                        }
                        else if(!empty($payment_method_insert)){
                            echo "Add Payment Method";  
                        }
                        else if(!empty($payment_method_edit)){
                            echo "Edit Payment Method";  
                        } 
                        
                        else if(!empty($city)){
                            echo "All Cities";  
                        }
                        else if(!empty($city_insert)){
                            echo "Add City";  
                        }
                        else if(!empty($city_edit)){
                            echo "Edit City";  
                        } 
                        
                         else if(!empty($ride_type)){
                            echo "All Ride Type";  
                        }
                        else if(!empty($ride_type_insert)){
                            echo "Add Ride Type";  
                        }
                        else if(!empty($ride_type_edit)){
                            echo "Edit Ride Type";  
                        } 
                        
                        
                        else if(!empty($payment)){
                            echo "All Payments Methods";  
                        }
                        else if(!empty($payment_insert)){
                            echo "Add Payment Methods";  
                        }
                        else if(!empty($payment_edit)){
                            echo "Edit Payment Method";  
                        } 
                        
                        
                         else if(!empty($coupon)){
                            echo "All Coupon";  
                        }
                        else if(!empty($coupon_insert)){
                            echo "Add Coupon";  
                        }
                        else if(!empty($coupon_edit)){
                            echo "Edit Coupon";  
                        }
                        else if(!empty($report)){
                            echo "Reports";  
                        }
                        
                        
                        else if(!empty($rider_license)){
                            echo "Driving License";  
                        }
                        else if(!empty($rider_identity_card)){
                            echo "Identity Card";  
                        }
                        else if(!empty($rider_car_documents)){
                            echo "Car Documents";  
                        }
                        else if(!empty($rider_car_pictures)){
                            echo "Car Pictures";  
                        }  
                        else if(!empty($rider_bank_detail)){
                            echo "Captain Bank Detail";  
                        }
                        else if(!empty($rider_car_detail)){
                            echo "Captain Car Detail";  
                        }
                        else if(!empty($earning)){
                            echo "Earning";  
                        }
                        
                        
                        
                        else if(!empty($artist)){
                            echo "All Author";  
                        }
                        else if(!empty($artist_insert)){
                            echo "Add Author";  
                        }
                        else if(!empty($artist_edit)){
                            echo "Edit Author";  
                        }
                        else if(!empty($comments)){
                            echo "All Comments";  
                        }
                        else if(!empty($admin_profile)){
                            echo "Admin Profile";  
                        }
                        else if(!empty($posts)){
                            echo "All Restaurants";  
                        }
                        else if(!empty($featured)){
                            echo "Featured Recipes";  
                        }
                        else if(!empty($posts_insert)){
                            echo "Add Restaurants";  
                        }
                        else if(!empty($posts_edit)){
                            echo "Edit Restaurants";  
                        }
                        else if(!empty($order)){
                            echo "All Orders";  
                        }
                        else if(!empty($live_insert)){
                            echo "Add Live Show";  
                        }
                        else if(!empty($live_edit)){
                            echo "Edit Live Show";  
                        }
                        else if(!empty($policy)){
                            echo "Add Policy";  
                        }
                        else if(!empty($admob_setting)){
                            echo "Admob Configuration";  
                        }
                       
                        else if(!empty($featured_slider_insert)){
                            echo "Insert Featured Sliders";  
                        }
                        else if(!empty($featured_slider_edit)){
                            echo "Edit Featured Sliders";  
                        }
                        else if(!empty($featured_slider)){
                            echo "Featured Sliders";  
                        }
                         else if(!empty($product)){
                            echo "All Products";  
                        }
                        else if(!empty($product_insert)){
                            echo "Add Product";  
                        }
                        else if(!empty($product_edit)){
                            echo "Edit Product";  
                        }
                        else if(!empty($rider)){
                            echo "All Riders";  
                        }
                        else if(!empty($rider_detail)){
                            echo "Rider Detail";  
                        }
                        else if(!empty($rider_completed_order)){
                            echo "Rider Completed Orders";  
                        }
                      
                    ?>
                </h5>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
            </a> <span class="profile-title">admin</span>

            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="admin-profile.php"><i class="fa fa-user"></i> My Profile</a>

                <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>

        </div>

    </div>
</div>