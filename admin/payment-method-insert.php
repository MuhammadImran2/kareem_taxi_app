<?php

  $payment_method_insert = "category-insert";


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
                  <form role="form" method="post" action="payment-method-actions.php" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="payment_method_name" placeholder="Enter Payment Method Name" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="payment_method_tag" placeholder="Enter Payment Method Tag" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="row form-group category-table">
                            <div class="col col-12 col-sm-7">
                                <label style="text-align: left">Upload  Image</label>
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
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="payment_method_insert" name="payment_method_insert" value="Insert Payment Method">
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

