<?php

  $rider = "posts";


include('header.php');
$type = $_GET['type'];



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
                      
               
                      <div class="tab-content pl-3 p-1" id="myTabContent">
                          
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                              
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                            <th>DeActivate</th>
                                            <th>Disable</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

<?php

  function shorten($string, $maxLength) {
     return substr($string, 0, $maxLength);
    }

  if($type == "approve"){
      $sel_qur_product = "SELECT * FROM Captain WHERE status = '0' ";
  }else{
      $sel_qur_product = "SELECT * FROM Captain WHERE status = '1' ";
  }
  

  $run = queryRunner($sel_qur_product);

  while ($sel_data_product  = rowRetriever($run)) {

    $id = $sel_data_product['id'];
    $name = $sel_data_product['name'];
    $email = $sel_data_product['email'];
    $phone = $sel_data_product['phone'];
    $picture = $sel_data_product['picture'];
    $enable = $sel_data_product['enable'];
    $status = $sel_data_product['status'];
       
?>

                <tr>
                    
                    <td><img src="uploads/image/<?php echo $picture; ?>" class="round-image" style="cursor: pointer; height: 50px; border-radius: 100%; width: 50px; " alt=""></td>
                    <td style="width: 20%;"><?php echo $name; ?></td>
                    <td style="width: 20%;" ><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    
                    <td>
                      <a href="rider-actions.php?id=<?php echo $id ?>"><i class="fa fa-times cat-circle-icon-red text-light p-2 font-2xl"></i></a>
                    </td>
                    
                      <td>
                        <label class="switch switch-text switch-info switch-pill">
                            <input type="checkbox" id="feature_<?php echo $id; ?>" class="switch-input" onClick="show123(<?php echo $status; ?>, <?php echo $id; ?>,'featured')" <?php if($status): echo "checked"; endif; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                        </label>
                    </td>
                    
                     <td>
                        <label class="switch switch-text switch-info switch-pill">
                            <input type="checkbox" id="switchimg_<?php echo $id; ?>" class="switch-input" onClick="show11(<?php echo $enable; ?>, <?php echo $id; ?>)" <?php if($enable == 1): echo "checked"; endif; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                        </label>
                    </td>
                    
                     <td>
                         
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                            <div class="dropdown-menu">
                                <a href="rider-license.php?id=<?php echo $id ?>" class="dropdown-item">Driving License</a>
                                <a href="rider-identity-card.php?id=<?php echo $id ?>" class="dropdown-item">Identity Card</a>
                                <a href="rider-car-documents.php?id=<?php echo $id ?>" class="dropdown-item">Car Documents</a>
                                <a href="rider-car-pictures.php?id=<?php echo $id ?>" class="dropdown-item">Car Pictures</a>
                                <a href="rider-bank-detail.php?id=<?php echo $id ?>" class="dropdown-item">Bank Detail</a>
                                <a href="rider-car-detail.php?id=<?php echo $id ?>" class="dropdown-item">Car Detail</a>
                                <!--<a href="rider-completed-orders.php?id=<?php echo $id ?>" class="dropdown-item">Completed Orders</a>-->
                               <!-- <div class="dropdown-divider"></div>-->
                                
                               
                            </div>
                       </li>
                    
                    </td>
                    
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
                  xhttp.open("GET", "updateUserToggle.php?var1="+str+"&var2="+str1+ "&& type=ride_enable", true);
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
                
                <script>
                
                 function show123(str, str1 ,str2) {
                  if(str.length == "")
                  {
                    document.getElementById("testing11").innerHTML = "please write something";
                    return;
                  }
                  
                  ///alert(str);
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
                  xhttp.open("GET", "updateUserToggle.php?var1="+str+"&var2="+str1+"&var3="+str2+ "&& type=rider_activation", true);
                  xhttp.send();
                }
                
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
   
    
    
        
<?php

    include('footer.php');

?>