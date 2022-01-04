<?php

  $admin_profile = "admin-profile";

include('header.php');



$id = $_SESSION['uid'];
$sel_qur = "select * from Admin where id = '".$id."'";
$sel_run = queryRunner($sel_qur);
$sel_data = rowRetriever($sel_run);

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
                  <form role="form" method="post" action="admin-profile-update.php">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-5">
                        <input type="text" name="user" disabled class="form-control" value="<?php echo $sel_data['username'] ?>">
                      </div>
                    </div>
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-5">
                        <input type="text" name="pass" pattern=".{5,}" title="5 characters minimum" class="form-control" required value="<?php echo $sel_data['password'] ?>">
                      </div>
                    </div>
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-5">
                          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-theme cate-btn text-light" value="Update">
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

