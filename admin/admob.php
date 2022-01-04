<?php

  $admob_setting = "admob_setting";

include('header.php');

// ******--------------**********
// Logic for Admob Configuration
// ******--------------**********    
    
    $sel_qur = "select * from admob where id = '1' ";
    $sel_run = mysql_query($sel_qur);
    $sel_data = mysql_fetch_array($sel_run);

?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header category-header">

           <?php

            include('header-bar.php');

            ?> 


        </header><!-- /header -->
        <!-- Header-->


        <?php

          if (!empty($_SESSION['success'])) {
              ?>
                <div class="center">
                  <div class="myAlert-top alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                    <strong>Successfully!</strong> Your Password is updated. 
                  </div>
                </div>
              <?php
              unset($_SESSION['success']);
            }

        ?>


        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <div class="card-body cat-card-body">
                
                  <form role="form" method="post" action="admob-actions.php?id=<?php echo 1 ?>" enctype="multipart/form-data">
                
                 <!--For Admob App Id-->
                  
                               <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_app_id" placeholder="Enter Admob App Id" class="form-control" value="<?php echo $sel_data['admob_app_id']; ?>" required>
                                  </div>
                                </div>
                            
                                <!--For Admob Banner Id-->
                              
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_banner_id" placeholder="Enter Admob Banner Id" class="form-control" value="<?php echo $sel_data['admob_banner_id']; ?>" required>
                                  </div>
                                </div>
                                
                                 <!--For Admob Interstitial Id-->
                              
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_interstitial_id" placeholder="Enter Admob Interstitial Id" class="form-control" value="<?php echo $sel_data['admob_interstitial_id']; ?>" >
                                  </div>
                                </div>
                                
                                
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_publisher_id" placeholder="Enter Admob Publisher  Id" class="form-control" value="<?php echo $sel_data['publisher_id']; ?>" >
                                  </div>
                                </div>
                                
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_privacy_url" placeholder="Enter Admob Privacy Url" class="form-control" value="<?php echo $sel_data['privacy_url']; ?>" >
                                  </div>
                                </div>
                                
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="submit" class="btn btn-theme cate-btn text-light" id="cat_insert" name="post_edit" value="Update Configuration">
                                  </div>
                                </div>
                                
                                </form>
                
                
                </div>
              </div>

            </div>

        </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php

    include('footer.php');

?>

