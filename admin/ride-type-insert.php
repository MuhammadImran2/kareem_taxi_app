<?php

  $ride_type_insert = "category-insert";


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
                  <form role="form" method="post" action="ride-type-actions.php" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_name" placeholder="Enter Ride Type Name" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_tagline" placeholder="Enter Ride Type Tagline" class="form-control" required>
                      </div>
                    </div>
                    
                     <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="ride_type_tag" placeholder="Enter Ride Type Tag" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="ride_type_category_id" id="ride_type_category_id" class="form-control selectpicker" data-live-search="true"  >
                                        <option value="">Select Ride Category</option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_ctg = "SELECT * FROM RideCategory WHERE enable = '0' ";
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
                                        <option value="">Select City</option>
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
                            <img src="images/ic_gallery.png" alt="" style="width: 25%" />
                          </div>
                          
                          <div class="fileupload-preview fileupload-exists" style="display: flex; margin: 0 auto;justify-content: center;margin-bottom: 20px;width: 25%; max-height: 120px"></div>
                          
                          <div class="cat-select-img-btn">
                            <span class="btn btn-theme02 btn-file  sel-img-text">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Browse</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" accept="image/*" name="postImgFile" class="default" />
                            </span>
                          </div>
                          
                        </div>  
                      </div>
                    </div>
                 
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                           <div class="text-center" >
                               <input  name = "country_id" value = "<?php echo $country_id ?>" type="hidden">
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="ride_type_insert" name="ride_type_insert" value="Insert Ride Type">
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
  
<script>
function ifYesFor(that) {
        if (that.value == "file") {             
           
           document.getElementById("ifYesForImage").style.display = "flex";
        
             
        }
    }
</script>    