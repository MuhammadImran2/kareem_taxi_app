<?php


$coupon_edit = "category-edit";
include('header.php');



$id = $_GET['id'];
$country_id = $_GET['country_id'];

$sel_qur = "SELECT coupon.id , coupon.coupon_code , coupon.coupon_reward ,coupon.coupon_limit , coupon.coupon_from_date , 
coupon.coupon_to_date  , location.id as city_id , location.name as city_name , coupon.enable
FROM Coupon as coupon
INNER JOIN Location as location ON location.id = coupon.place_id AND location.enable = '0'
where coupon.id = '" . $id . "' ORDER BY coupon.id ASC";
$sel_run = queryRunner($sel_qur);
while ($sel_data = rowRetriever($sel_run)){
      $coupon_id = $sel_data['id'];
      $coupon_code = $sel_data['coupon_code'];
      $coupon_reward = $sel_data['coupon_reward'];
      $coupon_limit = $sel_data['coupon_limit'];
      $coupon_from_date = $sel_data['coupon_from_date'];
      $coupon_to_date = $sel_data['coupon_to_date'];
      $city_id = $sel_data['city_id'];
      $city_name = $sel_data['city_name'];
     
   
  }


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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

                  <form role="form" method="post" action="coupon-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

              
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-4">
                          <label>Coupon Code</label>
                        <input type="text" name="coupon_code" placeholder="Enter Coupon Code" class="form-control" value="<?php echo $coupon_code; ?>" required>
                      </div>
                      
                      <div class="col col-12 col-sm-3">
                          <label>Coupon Reward ( % )</label>
                        <input type="text" name="coupon_reward" placeholder="Enter Coupon Reward" class="form-control" value="<?php echo $coupon_reward; ?>" required>
                      </div>
                      
                    </div>
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                          <label>Coupon Redeem Limit</label>
                        <input type="number" name="coupon_limit" placeholder="Compoun limit" class="form-control" step = "1" value="<?php echo $coupon_limit; ?>" required>
                      </div>
                    </div> 
                    
                    <div class="row form-group category-table">
                      
                      <div class="col col-12 col-sm-4">
                          <label>Beginning Date</label>
                           <div class="input-group date" id="datetimepicker1">
                                     <input type="text" id="datetimepicker-input" class="form-control" name="from_date"  />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                           </div>
                          <script>
                                     
                                     var selectToDateTime = "<?php echo $coupon_from_date ?>";
                                     var date = new Date(selectToDateTime);
                                     
                                     $('#datetimepicker1').datetimepicker();
                                     $('#datetimepicker1').data("DateTimePicker").defaultDate(date);
                                     $('#datetimepicker1').data("DateTimePicker").format("YYYY-MM-DD HH:mm:ss");
                                       
                                       
                          </script>
                       </div>
                 
                     <div class="col col-12 col-sm-3">
                        <label>Expiry Date</label>
                        <div class="input-group date" id="datetimepicker2">
                                     <input type="text" class="form-control" id = "to_date" name="to_date" value="<?php echo $expiry_date; ?>" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                        <script>
                                     
                                     var selectFromDateTime = "<?php echo $coupon_to_date ?>";
                                     var date = new Date(selectFromDateTime);
                                     
                                     $('#datetimepicker2').datetimepicker();
                                     $('#datetimepicker2').data("DateTimePicker").defaultDate(date);
                                     $('#datetimepicker2').data("DateTimePicker").format("YYYY-MM-DD HH:mm:ss");
                                          
                                       
                                       
                                      
                                       
                        </script>
                      </div>
                      
                    </div>
                    
                    <div class="row form-group category-table">
                         
                        <div class="col col-12 col-md-7">
                                    <select name="city_id" id="city_id" class="form-control selectpicker" data-live-search="true"  >
                                        <option value="<?php echo $city_id ?>"><?php echo $city_name ?></option>
                                        <option value=""></option>
                                     
    <?php 
    
    $sel_qur_city = "SELECT * FROM Location WHERE country_id = '".$country_id."' AND enable = '0' AND id NOT IN ('".$city_id."')";
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
                          <div class="text-center" >
                               <input name="country_id" value="<?php echo $country_id ?>" type="hidden" >
                               <input type="submit" class="btn btn-theme cate-btn text-light" id="coupon_edit" name="coupon_edit" value="Update Ride Type">
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