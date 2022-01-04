<?php


  $payment_method_edit = "category-edit";


include('header.php');



$id = $_GET['id'];

$sel_qur = "SELECT * FROM PaymentMethod where id = '" . $id . "'";
$sel_run = queryRunner($sel_qur);
while ($sel_data = rowRetriever($sel_run)){
      $payment_method_name = $sel_data['name'];
      $payment_method_tag = $sel_data['tag'];
      $payment_method_picture = $sel_data['picture'];
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

                  <form role="form" method="post" action="payment-method-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="payment_method_name" placeholder="Enter Payment Method" class="form-control" value="<?php echo $payment_method_name; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="payment_method_tag" placeholder="Enter Payment Method Tag" class="form-control" value="<?php echo $payment_method_tag; ?>" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                            <div class="col col-12 col-sm-7">
                                <label style="text-align: left">Upload Product Image</label>
                           </div>
                    </div>     
                    
                    <div class="row form-group category-table" id="ifYesForImage" style="display: flex;">
                      <div class="col col-12 col-sm-7">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            
                          <div class="fileupload-new thumbnail" style="width: 100%">
                            <img src="<?php echo "uploads/image/".$payment_method_picture ?>" alt="" style="width: 25%" />
                          </div>
                          
                          <div class="fileupload-preview fileupload-exists" style="display: flex; margin: 0 auto;justify-content: center;margin-bottom: 20px;width: 25%; max-height: 120px"></div>
                          
                          <div class="cat-select-img-btn">
                            <span class="btn btn-theme02 btn-file  sel-img-text">
                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Browse</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" accept="image/*" name="postImgFile" class="default" value="<?php echo $payment_method_picture; ?>"/>
                            </span>
                          </div>
                          
                        </div>  
                      </div>
                    </div>
                
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                          <div class="text-center" >
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="payment_method_edit" name="payment_method_edit" value="Update Payment Method">
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