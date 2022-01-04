<?php

  $country_insert = "category-insert";


include('header.php');

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
                  <form role="form" method="post" action="country-actions.php" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="country_name" placeholder="Enter country name." class="form-control" required>
                      </div>
                    </div>
                    
                     <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="country_percentage" placeholder="Enter country percentage" class="form-control" required>
                      </div>
                    </div>
                    
                    
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="submit" class="btn btn-theme cate-btn text-light" id="country_insert" name="country_insert" value="Insert Country">
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

