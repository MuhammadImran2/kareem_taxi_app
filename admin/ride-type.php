<?php

  $ride_type = "category-header";


include('header.php');



?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header category-header">

           <?php

            include('header-bar.php');
            $country_id=$_GET['id'];

            ?> 


        </header><!-- /header -->
        <!-- Header-->


      <?php 

        if (!empty($_SESSION['success-insert'])) {
          ?>
            <div class="center">
              <div class="myAlert-top alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                <strong>Successfully!</strong> Ride Type is added. 
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
                <strong>Successfully!</strong> Ride Type is updated. 
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
                <strong>Successfully!</strong> Ride Type is deleted. 
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
                                <strong class="card-title">
                                  <a href="ride-type-insert.php?country_id=<?php echo $country_id ?>"><i class="fa fa-plus cat-circle-icon-purple text-light p-2 font-2xl"></i></a>
                                  &nbsp;Add Ride Type
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Tagline</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Picture</th>
                                            <th>Actions</th>
                                            <th>Block/Unblock</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php

  $sel_qur_cat   = "SELECT ride_type.id , ride_type.name , ride_type.tagline , ride_type.picture ,ride_category.name as ride_category, 
    location.name as city_name , country.name as country_name , ride_type.enable
    FROM Country as country
    INNER JOIN Location as location ON location.country_id = country.id  AND location.enable = '0'
    INNER JOIN RideType as ride_type ON ride_type.place_id = location.id AND ride_type.enable = '0'
    INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
    WHERE country.id = '".$country_id."' AND country.enable = '0'
    ORDER BY ride_type.id ASC";
    //echo $sel_qur_cat;
  $sel_run_cat   = queryRunner($sel_qur_cat);
  
  while ($sel_data_cat  = rowRetriever($sel_run_cat)) {

    $id = $sel_data_cat['id'];
    $isEnable = $sel_data_cat['enable'];
?>

                <tr>
                    <td><?php echo $sel_data_cat['name']; ?></td>
                    <td><?php echo $sel_data_cat['ride_category']; ?></td>
                    <td><?php echo $sel_data_cat['tagline']; ?></td>
                    <td><?php echo $sel_data_cat['city_name']; ?></td>
                    <td><?php echo $sel_data_cat['country_name']; ?></td>
                    <td><img src="uploads/image/<?php echo $sel_data_cat['picture']; ?>" style="width: 40%;" alt=""></td>
                
                    <td>
                      <a href="ride-type-edit.php?id=<?php echo $id ?>&country_id=<?php echo $country_id ?>"><i class="fa fa-pencil cat-circle-icon-black text-light p-2 font-2xl"></i></a>
                      <a href="ride-type-actions.php?id=<?php echo $id ?>&country_id=<?php echo $country_id ?>"><i class="fa fa-times cat-circle-icon-red text-light p-2 font-2xl"></i></a>
                    </td>
                    </td>
                    <td>
                        <label class="switch switch-text switch-info switch-pill">
                            <input type="checkbox" class="switch-input" id="switchimg_<?php echo $id; ?>" onClick="show1(<?php echo $isEnable; ?>, <?php echo $id; ?>)" <?php if($isEnable == 1): echo "checked"; endif; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                        </label>
                    </td>
                </tr>


                <script>
                function show1(str, str1) {
                  if(str.length == "")
                  {
                    document.getElementById("testing1").innerHTML = "please write something";
                    return;
                  }
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                      document.getElementById("testing1").innerHTML = xhttp.responseText;
                      document.getElementById("switchimg_"+str1).setAttribute("onClick", "show1("+xhttp.responseText+","+str1+")");
                      $("#testing1").find("script").each(function(i) {
                          eval($(this).text());
                      });
                    }
                  };
                  xhttp.open("GET", "updateUserToggle.php?var1=" + str + "&& var2="+str1+ "&& type=ride_type", true);
                  xhttp.send();
                }
                </script>
                <div id="testing1"></div>
                                        
<?php 

}

?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

            </div>

        </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php

    include('footer.php');

?>

