<?php

  $payment_insert = "category-insert";


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
                  <form role="form" method="post" action="payment-actions.php" enctype="multipart/form-data">


                   
                   
                    <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="payment_id" id="payment_id" class="form-control selectpicker"  data-live-search="true"   >
                                        <option value="">Select Payment Methods</option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_ctg = "SELECT * FROM PaymentMethod WHERE enable = '0' ";
    $sel_run_ctg = queryRunner($sel_qur_ctg);
    
    while($sel_data_ctg = rowRetriever($sel_run_ctg)) {  
    
    ?>
                                           <option value="<?php echo $sel_data_ctg['id'] ?>"><?php echo $sel_data_ctg['name'] ?></option>
    
    <?php } ?>
    
    
                                     </select>
                               </div>
                           
                    </div>
                
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                           <div class="text-center" >
                               <input  name = "country_id" value = "<?php echo $country_id ?>" type="hidden">
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="payment_insert" name="payment_insert" value="Insert Payment Method">
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
  

