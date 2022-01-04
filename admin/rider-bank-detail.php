<?php

  $rider_bank_detail = "posts-edit";


include('header.php');
$rider_id = $_GET['id'];
    
    

?>

  <!--<script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=571ma62fmefzor3lwwwbkn9khs0chpwyvjru2hqe0szdkwi0'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>-->
  
  <script src="assets/ckeditor/ckeditor.js">
  </script>
  


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

        if (!empty($_SESSION['success-insert'])) {
          ?>
            <div class="center">
              <div class="myAlert-top alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                <strong>Successfully!</strong> Post is added. 
              </div>
            </div>
          <?php
          unset($_SESSION['success-insert']);
        }
        elseif (!empty($_SESSION['success-edit'])) {
          ?>
            <div class="center">
              <div class="myAlert-top alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                <strong>Successfully!</strong> Post is updated. 
              </div>
            </div>
          <?php
          unset($_SESSION['success-edit']);
        }
        elseif (!empty($_SESSION['success-del'])) {
          ?>
            <div class="center">
              <div class="myAlert-top alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                <strong>Successfully!</strong> Post is deleted. 
              </div>
            </div>
          <?php
          unset($_SESSION['success-del']);
        }


        $id = $_GET['id'];
        $menu_ctg_data = [];

        $sel_qur_product = "SELECT * FROM CaptainBankDetail WHERE captain_id = '".$rider_id."' ";
        $run = queryRunner($sel_qur_product);
        while ($sel_data_product  = rowRetriever($run)) {
    
        $account_holder_name = $sel_data_product['account_holder_name'];
        $account_no = $sel_data_product['account_no'];
        $bank_no = $sel_data_product['bank_no'];
        $bank_transit_no = $sel_data_product['bank_transit_no'];
               
       }
        
        

      ?>




        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <div class="card-body cat-card-body">
                  <form role="form" method="post" action="post-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                      
                   
                    <div class="row form-group category-table">
                         
                          <div class="col col-12 col-md-4">
                                <label>Account Holder Name</label>
                                <input type="text" name="account_holder_name" placeholder="Account Holder Name" value="<?php echo $account_holder_name; ?>" class="form-control" required>
                           </div>
                           <div class="col col-12 col-md-3">
                                <label>Account No.</label>
                                <input type="text" name="account_no" placeholder="Account No." value="<?php echo $account_no; ?>" class="form-control" required>
                            </div>
                    </div>
                    
                    <div class="row form-group category-table">
                        
                      <div class="col col-12 col-sm-4">
                          <label>Bank No.</label>
                        <input type="text" name="bank_no" placeholder="Bank No." value="<?php echo $bank_no; ?>" class="form-control" required>
                      </div>
                      
                      <div class="col col-12 col-md-3">
                                <label>Bank Transit No.</label>
                                <input type="text" name="transit_no" placeholder="Bank Transit No." value="<?php echo $bank_transit_no; ?>" class="form-control" required>
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
           
            /*document.getElementById("ifYesForImage").style.display = "flex";*/
            document.getElementById("ifYesForVideo").style.display = "flex";
            document.getElementById("fileUrl").style.display = "none";
            document.getElementById("file_url").required=false;
             
        } else if(that.value == "youtube") {
     
            /*document.getElementById("ifYesForImage").style.display = "flex";*/
            document.getElementById("ifYesForVideo").style.display = "none";
             document.getElementById("fileUrl").style.display = "flex";
             document.getElementById("file_url").required=true;
             
        } else if(that.value == "url") {
     
            /*document.getElementById("ifYesForImage").style.display = "flex";*/
            document.getElementById("ifYesForVideo").style.display = "none";
             document.getElementById("fileUrl").style.display = "flex";
             document.getElementById("file_url").required=true;
             
        } else if(that.value == "standard") {
     
            /*document.getElementById("ifYesForImage").style.display = "flex";*/
            document.getElementById("ifYesForVideo").style.display = "none";
             document.getElementById("fileUrl").style.display = "none";
             document.getElementById("file_url").required=false;
             
        } /*else{
            document.getElementById("ifYesForImage").style.display = "none";
            document.getElementById("ifYesForVideo").style.display = "none";
        }*/
    }

</script>
