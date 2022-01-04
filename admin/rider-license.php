<?php

  $rider_license = "posts";


include('header.php');
$rider_id = $_GET['id'];



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
                      <!--<strong class="card-title">
                        <a href="product-insert.php?id=<?php  echo $restaurant_id ?>"><i class="fa fa-plus cat-circle-icon-purple text-light p-2 font-2xl"></i></a>
                        &nbsp;Add Product
                      </strong>-->
                  </div>
                  <div class="card-body">
                      
                      <div class="tab-content pl-3 p-1" id="myTabContent">
                          
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                              
                                    <thead>
                                        <tr>
                                            <th>Documents</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

<?php

  function shorten($string, $maxLength) {
     return substr($string, 0, $maxLength);
    }

  $sel_qur_product = "SELECT captain_doc.id , doc_picture.picture_url ,captain_doc.status , captain_doc.enable
  FROM CaptainDocuments as captain_doc
  INNER JOIN DocumentPicture as doc_picture ON doc_picture.term_id = captain_doc.id
  WHERE captain_doc.term_id = '".$rider_id."' AND captain_doc.document_type = 'driving_license' ";

  $run = queryRunner($sel_qur_product);

  while ($sel_data_product  = rowRetriever($run)) {

    $id = $sel_data_product['id'];
    $picture = $sel_data_product['picture_url'];
    $status = $sel_data_product['status'];
       
?>

                <tr>
                    
                    <td><img src="uploads/image/<?php echo $picture; ?>" class="round-image" style="cursor: pointer; height: 100px; border-radius: 100%; width: 100px; " alt=""></td>
                    
                    <td><?php if($status=="0") echo "Approved" ; elseif ($status == "1") echo "Declined"; elseif ($status == "2") echo "Awaiting Approval"; ?></td>
                    
                  <td>
                         
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                            <div class="dropdown-menu">
                                <a href="rider-detail-actions.php?id=<?php echo $id ?>&action=approved&rider_id=<?php echo $rider_id ?>&type=rider-license" class="dropdown-item">Approved</a>
                                <a href="rider-detail-actions.php?id=<?php echo $id ?>&action=declined&rider_id=<?php echo $rider_id ?>&type=rider-license" class="dropdown-item">Declined</a>
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