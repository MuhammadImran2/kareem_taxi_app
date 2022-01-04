<?php

  $earning = "posts-edit";


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
        $menu_ctg_data = '["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"]';
        
        $monthly_earning = [];
        $monthly_earning_label = [];
        
        $yearly_earning = [];
        $yearly_earning_label = [];
        
        $weekly_earning = [];
        $weekly_earning_label = [];
        
        $yearly_earning_all = [];
        $yearly_earning_label_all = [];

        $sel_qur_weekly = "SELECT SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 2), ' ', -1)) as price , company_percentage ,
        DAYNAME(date(`date_created`)) as date_no , MONTHNAME(date(`date_created`)) as month_name , SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 1), ' ', -1) as currency_symbol
        FROM RideOrder  
        WHERE WEEKOFYEAR(date_created) = WEEKOFYEAR(NOW())  
        GROUP BY DAYNAME(date_created)";
        
        $run = queryRunner($sel_qur_weekly);
        while ($sel_data_product  = rowRetriever($run)) {
    
        $price = $sel_data_product['price'];
        $company_percentage = $sel_data_product['company_percentage'];
        $date_no = $sel_data_product['date_no'];
        $month_name = $sel_data_product['month_name'];
        $currency_symbol = $sel_data_product['currency_symbol'];
        
        $earning = ($price * $company_percentage)/100;
        
        array_push($weekly_earning,$earning);
        array_push($weekly_earning_label,$date_no);
               
       }
       
       
        $sel_qur_monthly = "SELECT SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 2), ' ', -1)) as price , company_percentage , 
        DAY(date(`date_created`)) as date_no , MONTHNAME(date(`date_created`)) as month_name , SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 1), ' ', -1) as currency_symbol
        FROM RideOrder 
        WHERE YEAR(date_created) = YEAR(NOW()) AND MONTH(date_created)=MONTH(NOW()) 
        GROUP BY DAY(date_created) ";
        $run = queryRunner($sel_qur_monthly);
        while ($sel_data_product  = rowRetriever($run)) {
    
        $price = $sel_data_product['price'];
        $company_percentage = $sel_data_product['company_percentage'];
        $date_no = $sel_data_product['date_no'];
        $month_name = $sel_data_product['month_name'];
        $currency_symbol = $sel_data_product['currency_symbol'];
        
        $earning = ($price * $company_percentage)/100;
        
        array_push($monthly_earning,$earning);
        array_push($monthly_earning_label,$date_no." ".$month_name);
        
               
       }
       
      
       
        $sel_qur_yearly = "SELECT SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 2), ' ', -1)) as price , company_percentage , 
        DAY(date(`date_created`)) as date_no , MONTHNAME(date(`date_created`)) as month_name , SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 1), ' ', -1) as currency_symbol
        FROM RideOrder WHERE YEAR(date_created) = YEAR(NOW())
        GROUP BY MONTH(date_created) ";
        
        $run = queryRunner($sel_qur_yearly);
        while ($sel_data_product  = rowRetriever($run)) {
    
        $price = $sel_data_product['price'];
        $company_percentage = $sel_data_product['company_percentage'];
        $date_no = $sel_data_product['date_no'];
        $month_name = $sel_data_product['month_name'];
        $currency_symbol = $sel_data_product['currency_symbol'];
        
        $earning = ($price * $company_percentage)/100;
        
        array_push($yearly_earning,$earning);
        array_push($yearly_earning_label,$month_name);
               
       }
        
        
       $sel_qur_yearly_all = "SELECT SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 2), ' ', -1)) as price , company_percentage , 
        DAY(date(`date_created`)) as date_no , YEAR(date(`date_created`)) as month_name , SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 1), ' ', -1) as currency_symbol
        FROM RideOrder WHERE YEAR(date_created) = YEAR(NOW())
        GROUP BY YEAR(date_created) ";
        
        $run = queryRunner($sel_qur_yearly_all);
        while ($sel_data_product  = rowRetriever($run)) {
    
        $price = $sel_data_product['price'];
        $company_percentage = $sel_data_product['company_percentage'];
        $date_no = $sel_data_product['date_no'];
        $month_name = $sel_data_product['month_name'];
        $currency_symbol = $sel_data_product['currency_symbol'];
        
        $earning = ($price * $company_percentage)/100;
        
        array_push($yearly_earning_all,$earning);
        array_push($yearly_earning_label_all,$month_name);
               
       }    
        

      ?>




        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <!--<div class="card-body cat-card-body">-->
                  
                  <div class="row">
                      
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Weekly Earning</h4>
                                <canvas id="singelBarChart01"></canvas>
                            </div>
                        </div>
                    
                    </div> <!-- /# column -->
                    
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Daily Earning</h4>
                                <canvas id="lineChart01"></canvas>
                            </div>
                            </div>
                     </div>        
                     
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Monthly Earning </h4>
                                <canvas id="barChart01"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Yearly Earning</h4>
                                <canvas id="barChart02"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    



                   



                </div>
                  
                  
                <!--</div>-->
              </div>

            </div>

        </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php

    include('footer.php');

?>

   <!--  Chart js -->
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/init-scripts/chart-js/chartjs-init.js"></script>

<script type="text/javascript" >
   
    // single bar chart
    var ctx = document.getElementById( "singelBarChart01" );
    var weeklyLabel = <?php echo '["' . implode('", "', $weekly_earning_label) . '"]' ?>; 
    var weeklyEarning = <?php echo '["' . implode('", "', $weekly_earning) . '"]' ?>; 
    
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels:  weeklyLabel ,
            datasets: [
                {
                    label: "Weekly Earning",
                    data: weeklyEarning ,
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
    
    
    //line chart
    var ctx = document.getElementById( "lineChart01" );
    ctx.height = 150;
    var monthlyLabel = <?php echo '["' . implode('", "', $monthly_earning_label) . '"]' ?>; 
    var monthlyEarning = <?php echo '["' . implode('", "', $monthly_earning) . '"]' ?>; 
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: monthlyLabel ,
            datasets: [
                {
                    label: "Daily Earnings",
                     borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: monthlyEarning
                            }
                        ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    } );
    
    //bar chart
    var ctx = document.getElementById( "barChart01" );
    var yearlyLabel = <?php echo '["' . implode('", "', $yearly_earning_label) . '"]' ?>; 
    var yearlyEarning = <?php echo '["' . implode('", "', $yearly_earning) . '"]' ?>; 
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: yearlyLabel ,
            datasets: [
                {
                    label: "Monthly Earning",
                    data: yearlyEarning ,
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
    
    
    //bar chart
     var ctx = document.getElementById( "barChart02" );
     var yearlyLabelAll = <?php echo '["' . implode('", "', $yearly_earning_label_all) . '"]' ?>; 
    var yearlyEarningAll = <?php echo '["' . implode('", "', $yearly_earning_all) . '"]' ?>; 
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: yearlyLabelAll ,
            datasets: [
                {
                    label: "Yearly Earning",
                    data: yearlyEarningAll ,
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
    
    
    
 

</script>
