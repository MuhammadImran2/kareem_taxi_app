<?php


$ride_type_edit = "category-edit";
include('header.php');



$id = $_GET['id'];
$country_id = $_GET['country_id'];

$sel_qur = "SELECT ride_type.id , ride_type.name , ride_type.tagline ,ride_type.tag , ride_type.picture , 
ride_category.id as category_id , ride_category.name as ride_category , location.id as city_id , 
location.name as city_name , country.name as country_name , ride_type.enable
FROM RideType as ride_type
INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
INNER JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0'
INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0'
where ride_type.id = '" . $id . "' ORDER BY ride_type.id ASC";
$sel_run = queryRunner($sel_qur);
while ($sel_data = rowRetriever($sel_run)){
      $ride_type_name = $sel_data['name'];
      $ride_type_tagline = $sel_data['tagline'];
      $ride_type_category_id = $sel_data['category_id'];
      $ride_type_category_name = $sel_data['ride_category'];
      $ride_type_city_id = $sel_data['city_id'];
      $ride_type_city_name = $sel_data['city_name'];
      $ride_type_tag = $sel_data['tag'];
      $ride_type_picture = $sel_data['picture'];
   
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

                  <form role="form" method="post" action="ride-type-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

               
                    
                     <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_name" placeholder="Enter Ride Type Name" class="form-control" value="<?php echo $ride_type_name; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_tagline" placeholder="Enter Ride Type Tagline" class="form-control" value="<?php echo $ride_type_tagline; ?>" required>
                      </div>
                    </div>
                    
                      <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_tag" placeholder="Enter Ride Type Tag" class="form-control" value="<?php echo $ride_type_tag; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="ride_type_category_id" id="ride_type_category_id" class="form-control selectpicker" data-live-search="true"  >
                                        <option value="<?php echo $ride_type_category_id ?>"><?php echo $ride_type_category_name ?></option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_ctg = "SELECT * FROM RideCategory WHERE enable = '0' AND id NOT IN ('".$ride_type_category_id."') ";
    $sel_run_ctg = queryRunner($sel_qur_ctg);
    
    while($sel_data_ctg = rowRetriever($sel_run_ctg)) {  
    
    ?>
                                           <option value="<?php echo $sel_data_ctg['id'] ?>"><?php echo $sel_data_ctg['name'] ?></option>
    
    <?php } ?>
    
    
                                     </select>
                               </div>
                           
                    </div>
                    
                    <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="ride_type_city_id" id="ride_type_city_id" class="form-control selectpicker" data-live-search="true"  >
                                        <option value="<?php echo $ride_type_city_id ?>"><?php echo $ride_type_city_name ?></option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_city = "SELECT * FROM Location WHERE country_id = '".$country_id."' AND enable = '0' ";
    $sel_qur_city= queryRunner($sel_qur_city);
    
    while($sel_data_city = rowRetriever($sel_qur_city)) {  
    
    ?>
                                           <option value="<?php echo $sel_data_city['id'] ?>"><?php echo $sel_data_city['name'] ?></option>
    
    <?php } ?>
    
    
                                     </select>
                               </div>
                           
                    </div>
                    
                    <div class="row form-group category-table">
                            <div class="col col-12 col-sm-7">
                                <label style="text-align: left">Upload Image</label>
                           </div>
                    </div>     
                    
                     <div class="row form-group category-table" id="ifYesForImage" style="display: flex;">
                      <div class="col col-12 col-sm-7">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            
                          <div class="fileupload-new thumbnail" style="width: 100%">
                            <img src="<?php echo "uploads/image/".$ride_type_picture ?>" alt="" style="width: 25%" />
                          </div>
                          
                          <div class="fileupload-preview fileupload-exists" style="display: flex; margin: 0 auto;justify-content: center;margin-bottom: 20px;width: 25%; max-height: 120px"></div>
                          
                          <div class="cat-select-img-btn">
                            <span class="btn btn-theme02 btn-file  sel-img-text">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Browse</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" accept="image/*" name="postImgFile" class="default" value="<?php echo $ride_type_picture; ?>"/>
                            </span>
                          </div>
                          
                        </div>  
                      </div>
                    </div>
                  
                
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                          <div class="text-center" >
                               <input name="country_id" value="<?php echo $country_id ?>" type="hidden" >
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="ride_type_edit" name="ride_type_edit" value="Update Ride Type">
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