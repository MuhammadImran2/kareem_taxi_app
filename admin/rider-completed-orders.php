<?php

  $rider_completed_order = "posts";


include('header.php');
$id = $_GET['id'];

function queryRunner($query){
     $result=mysql_query($query) OR die(mysql_error());
     return $result;
    }
    
    function countRow($result){
    
      return mysql_num_rows($result);
    }
    
    function rowRetriever($result){
    
      return mysql_fetch_assoc($result);
    }
    
    function findLastInsertId(){

      return mysql_insert_id();
    }

    function simplifySpecialCharacter($data){

      return mysql_real_escape_string($data);
    }

?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header category-header">

           <?php

            include('header-bar.php');

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
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total Bill</th>
                                            <th>Payment Type</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

<?php

  function shorten($string, $maxLength) {
     return substr($string, 0, $maxLength);
    }

  $sel_qur_product = "SELECT product.name , product_order.product_quantity , product_order.product_price , user_order.payment_type FROM RiderMeta as rider_meta
  INNER JOIN ProductOrder as product_order ON product_order.order_id = rider_meta.meta_value
  INNER JOIN Product as product ON product.id = product_order.product_id
  INNER JOIN UserOrder as user_order ON user_order.id = rider_meta.meta_value
  WHERE rider_meta.term_id = '".$id."' AND rider_meta.meta_key = '_rider_assigned_order_' AND rider_meta.meta_status = 'history' ";

  $run = queryRunner($sel_qur_product);

  while ($sel_data_product  = rowRetriever($run)) {

 
    $name = $sel_data_product['name'];
    $quantity = $sel_data_product['product_quantity'];
    $price = $sel_data_product['product_price'];
    $payment_type = $sel_data_product['payment_type'];
       
?>

                <tr>
                    
                    <td style="width: 20%;"><?php echo $name; ?></td>
                    <td style="width: 20%;" ><?php echo $quantity; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $payment_type; ?></td>
                  
                    
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