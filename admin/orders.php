<?php

  $order = "posts";


include('header.php');


?>

    <style> 
      .dropdown-toggle::after { 
        content: none; 
    } 
    </style> 

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header category-header">

           <?php

            include('header-bar.php');
            $action = $_GET['action'];    

            ?> 


        <style> 
                .dropdown-toggle::after { 
                    content: none; 
                } 
        </style> 
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

      ?>



        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
            
                <div class="card">
                  <div class="card-header">
                      <!--<strong class="card-title">
                        <a href="product-insert.php?id=<?php  echo $restaurant_id ?>"><i class="fa fa-plus cat-circle-icon-purple text-light p-2 font-2xl"></i></a>
                        &nbsp;Add Product
                      </strong>-->
                  </div>
                  <div class="card-body">
                      
                      <!--<ul class="nav nav-tabs" id="myTab" role="tablist">
                          
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Post Image</a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Post Video</a>
                        </li>
                        
                      </ul>-->
                      
                      <div class="tab-content pl-3 p-1" id="myTabContent">
                          
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                              
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Captain Name</th>
                                            <th>Ride Name</th>
                                            <th>Trip Time</th>
                                            <th>Total Bill</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

<?php

  function shorten($string, $maxLength) {
     return substr($string, 0, $maxLength);
    }
  
  $order_status;
  
  if($action == "completed"){
      $status = "4";
  }else if($action == "pending"){
      $status= "1";
  }else if($action == "cancel"){
      $status= "3";
  }else if($action == "schedule"){
      $status= "2";
  }
  
  $sel_qur_product = "SELECT  ride_order.id , concat(user.first_name , ' ',user.last_name) as user , captain.name as captain , ride_type.name as ride_type , 
  ride_order.distance , ride_order.price , ride_order.trip_time  
  FROM RideOrder as ride_order 
  INNER JOIN Captain as captain ON captain.id = ride_order.captain_id 
  INNER JOIN User as user ON user.id = ride_order.user_id
  INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
  WHERE ride_order.status = '".$status."' ";

   
  $run = queryRunner($sel_qur_product);
  while ($sel_data_product  = rowRetriever($run)) {

    $order_id = $sel_data_product['id'];
    $user_name = $sel_data_product['user'];
    $captain_name = $sel_data_product['captain'];
    $ride_type = $sel_data_product['ride_type'];
    $price = $sel_data_product['price'];
    $trip_time = $sel_data_product['trip_time'];
   
       
?>

                <tr>
                    <td style="width: 20%;"><?php echo $user_name; ?></td>
                    <td style="width: 20%;" ><?php echo $captain_name; ?></td>
                    <td><?php echo $ride_type; ?></td>
                    <td><?php echo $trip_time; ?></td>
                    <td><?php echo $price; ?></td>
                    
                    
                </tr>
                
                
                <div class="modal hide" id="addBookDialog">
                     <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>Modal header</h3>
                      </div>
                      <div class="modal-body">
                            <p>some content</p>
                            <input type="text" name="bookId" id="bookId" value=""/>
                      </div>
                </div>
                
                <!-- Modal -->
                <div id="myModals" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      
                      <div class="modal-body">
                        <p>Some text in the modal.</p>
                        <input type="text" name="bookId" id="bookId" value=""/>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      
                    </div>
                
                  </div>
                </div>


                <script>
                
                function show11(str, str1) {
                  if(str.length == "")
                  {
                    document.getElementById("testing11").innerHTML = "please write something";
                    return;
                  }
                  
                 // alert(str);
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                      document.getElementById("testing11").innerHTML = xhttp.responseText;
                     // alert(xhttp.responseText);
                      //alert("switchimg_"+str1);
                      document.getElementById("switchimg_"+str1).setAttribute("onClick", "show11("+xhttp.responseText+","+str1+")");
                      $("#testing11").find("script").each(function(i) {
                          eval($(this).text());
                      });
                    }
                  };
                  xhttp.open("GET", "updatePostToggle.php?var1="+str+"&var2="+str1, true);
                  xhttp.send();
                }
                
                 $(document).on("click", ".open-AddBookDialog", function () {
                     var myBookId = $(this).data('id');
                     $(".modal-body #bookId").val( myBookId );
                     // As pointed out in comments, 
                     // it is unnecessary to have to manually call the modal.
                     // $('#addBookDialog').modal('show');
                });
                
                </script>
                
                
                
                
                <div id="testing11"></div>
                                        
<?php 

}

?>

                                    </tbody>
                                </table>
                        </div>
                        
                      
                      </div>
                    </div>
                  </div>


            </div>

        </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script>
                    
        function show123(str, str1 ,str2) {
          if(str.length == "")
          {
            document.getElementById("testing11").innerHTML = "please write something";
            return;
          }
          
          //alert(str);
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              document.getElementById("testing11").innerHTML = xhttp.responseText;
               // alert(xhttp.responseText);
              //alert("switchimg_"+str1);
              document.getElementById("feature_"+str1).setAttribute("onClick", "show123("+xhttp.responseText+","+str1+",'"+str2+"')");
              $("#testing11").find("script").each(function(i) {
                  eval($(this).text());
              });
            }
          };
          xhttp.open("GET", "updatePostToggle.php?var1="+str+"&var2="+str1+"&var3="+str2);
          xhttp.send();
        }
        
       
            
    </script>
    
    
        
<?php

    include('footer.php');

?>