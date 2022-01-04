<?php

  $city_insert = "category-insert";


include('header.php');

?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header category-header">

           <?php

            include('header-bar.php');
            $country_id=$_GET['country_id'];

            ?> 
            
     


        </header><!-- /header -->
        <!-- Header-->



        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <div class="card-body cat-card-body">
                  <form role="form" method="post" action="city-actions.php" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_name" placeholder="Enter City Name" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_latitude" placeholder="Enter City Latitude" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_longitude" placeholder="Enter City Longitude" class="form-control" required>
                      </div>
                    </div>
                    
                 
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                           <div class="text-center" >
                               <input  name = "country_id" value = "<?php echo $country_id ?>" type="hidden">
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="city_insert" name="city_insert" value="Insert City">
                           </div>  
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
  

