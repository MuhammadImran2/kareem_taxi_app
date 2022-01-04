<?php


$city_edit = "category-edit";
include('header.php');



$id = $_GET['id'];
$country_id = $_GET['country_id'];

$sel_qur = "SELECT * FROM Location where id = '" . $id . "'";
$sel_run = queryRunner($sel_qur);
while ($sel_data = rowRetriever($sel_run)){
      $city_name = $sel_data['name'];
      $city_latitude = $sel_data['latitude'];
      $city_longitude = $sel_data['longitude'];
   
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

                  <form role="form" method="post" action="city-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_name" placeholder="Enter City Name" class="form-control" value="<?php echo $city_name; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_latitude" placeholder="Enter City Latitude" class="form-control" value="<?php echo $city_latitude; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="city_longitude" placeholder="Enter City Longitude" class="form-control" value="<?php echo $city_longitude; ?>" required>
                      </div>
                    </div>
                    
                  
                
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                          <div class="text-center" >
                               <input name="country_id" value="<?php echo $country_id ?>" type="hidden" >
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="city_edit" name="city_edit" value="Update City">
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

<script type="text/javascript" >
    function ifYesFor(that) {
        if (that.value == "file") {             
            document.getElementById("ifYesForImage").style.display = "flex";
           
        } 
    }
</script>