<?php


$payment_edit = "category-edit";
include('header.php');



$id = $_GET['id'];
$country_id = $_GET['country_id'];

$sel_qur = "SELECT payment_type.id , payment_method.id as payment_method_id , payment_method.name FROM PaymentType as payment_type
INNER JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id
where payment_type.id = '" . $id . "'";
$sel_run = queryRunner($sel_qur);
while ($sel_data = rowRetriever($sel_run)){
      $payment_id = $sel_data['id'];
      $payment_method_id = $sel_data['payment_method_id'];
      $payment_name = $sel_data['name'];
   
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

                  <form role="form" method="post" action="payment-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

                     <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="payment_id" id="payment_id" class="form-control selectpicker"  data-live-search="true"   >
                                        <option value="<?php echo $payment_id ?>"><?php echo $payment_name ?></option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_ctg = "SELECT * FROM PaymentMethod WHERE enable = '0' AND id NOT IN ('".$payment_method_id."')";
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
                               <input name="country_id" value="<?php echo $country_id ?>" type="hidden" >
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="payment_edit" name="payment_edit" value="Update City">
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