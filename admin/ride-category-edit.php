<?php


  $category_edit = "category-edit";


include('header.php');




$id = $_GET['id'];

  $sel_qur = "SELECT * FROM RideCategory where id = '" . $id . "'";
  $sel_run = queryRunner($sel_qur);
  while ($sel_data = rowRetriever($sel_run)){
      $category_name = $sel_data['name'];
  }


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



        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <div class="card-body cat-card-body">

                  <form role="form" method="post" action="ride-category-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="category_name" placeholder="Enter Category Name" class="form-control" value="<?php echo $category_name; ?>" required>
                      </div>
                    </div>
                    
                
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="submit" class="btn btn-theme cate-btn text-light" id="category_edit" name="category_edit" value="Update Category">
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

