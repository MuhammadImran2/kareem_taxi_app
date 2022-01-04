<?php

  $Dashboard = "dashboard";


include('header.php');




?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->

           <?php

            include('header-bar.php');


// ******--------------**********
// Logic for Cities cardboard
// ******--------------**********

    $sel_qur_postImg   = "select COUNT(*) as total from Location where enable = '0'";
    $sel_run_postImg   = queryRunner($sel_qur_postImg);
    $sel_data_city       = rowRetrieverObject($sel_run_postImg);
    
   
            


// ******--------------**********
// Logic for Countries cardboard
// ******--------------**********

    $sel_qur_postVideo   = "select COUNT(*) as total from Country where enable = '0'";
    $sel_run_postVideo   = queryRunner($sel_qur_postVideo);
    $sel_data_country       = rowRetrieverObject($sel_run_postVideo);




// ******--------------**********
// Logic for user cardboard
// ******--------------**********

    $sel_qur_postUser   = "select COUNT(*) as total from User WHERE enable = '0' ";
    $sel_run_postUser   = queryRunner($sel_qur_postUser);
    $sel_data_user       = rowRetrieverObject($sel_run_postUser);
   



// ******--------------**********
// Logic for comment cardboard
// ******--------------**********

    $sel_qur_postComment   = "select COUNT(*) as total from Captain WHERE enable = '0' ";
    $sel_run_postComment   = queryRunner($sel_qur_postComment);
    $sel_data_captain       =    rowRetrieverObject($sel_run_postComment);
   
    

    

?> 


        <div class="content mt-5">
            
             <div class="col-sm-6 col-lg-3 header-small-cards">
                <div class="card">
                <div class="card-body">
                    <div class="clearfix float-left">
                        <div class="text-muted text-uppercase font-xs small">Cities</div>
                        <div class="h6 text-secondary font-weight-bold mb-3 mt-1"><?php echo $sel_data_city -> total; ?></div>
                    </div> 
                    
                    <div class="float-right"  >
                        
                       <i class="fa fa-building bg-flat-color-5 circle-icon-orange p-3 font-2xl text-light"></i>
                       
                    </div>
                    
                  
                    <!--<div class="float-left">
                        <?php  if ($videoBlockRatio >= 50) : ?>
                            <span class="text text-danger"><i class="fa fa-arrow-down"> <?php echo $videoBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  else : ?>
                            <span class="text text-success"><i class="fa fa-arrow-up"> <?php echo $videoBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  endif; ?>
                    </div> -->
                    
                </div>
               </div>
            </div>

          

            <!--/.col-->

          
            <div class="col-sm-6 col-lg-3 header-small-cards">
                <div class="card">
                <div class="card-body">
                    <div class="clearfix float-left">
                        
                        <div class="text-muted text-uppercase font-xs small">Countries</div>
                        
                        <div class="h6 text-secondary font-weight-bold mb-3 mt-1"><?php echo $sel_data_country -> total; ?></div>
                        
                    </div> 
                    
                    <div class="float-right">
                        <i class="fa fa-flag bg-flat-color-5 circle-icon-lightblue p-3 font-2xl text-light"></i>
                    </div>
                    
                    <!--<div class="float-left">
                        <?php  if ($ComBlockRatio >= 50) : ?>
                            <span class="text text-danger"><i class="fa fa-arrow-down"> <?php echo $ComBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  else : ?>
                            <span class="text text-success"><i class="fa fa-arrow-up"> <?php echo $ComBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  endif; ?>
                    </div> -->   
                </div>
               </div>
            </div>
            
            <!--/.col-->

            <div class="col-sm-6 col-lg-3 header-small-cards">
                <div class="card">
                <div class="card-body">
                    
                    <div class="clearfix float-left">
                        
                        <div class="text-muted text-uppercase font-xs small">Users</div>
                        
                        <div class="h6 text-secondary font-weight-bold mb-3 mt-1"><?php echo $sel_data_user -> total ; ?></div>
                    </div> 
                    
                    <div class="float-right">
                        <i class="fa fa-users bg-flat-color-5 circle-icon-yellow p-3 font-2xl text-light"></i>
                    </div>
                    
                    <!--<div class="float-left">
                        
                        <?php  if ($UserBlockRatio >= 50) : ?>
                        
                            <span class="text text-danger"><i class="fa fa-arrow-down"> <?php echo $UserBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                            
                        <?php  else : ?>
                        
                            <span class="text text-success"><i class="fa fa-arrow-up"> <?php echo $UserBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                            
                        <?php  endif; ?>
                        
                    </div>    -->
                    
                </div>
               </div>
            </div>
            
            <!--/.col-->

            <div class="col-sm-6 col-lg-3 header-small-cards">
               <div class="card">
                <div class="card-body">
                    
                    <div class="clearfix float-left">
                        <div class="text-muted text-uppercase font-xs small">Captains</div>
                        <div class="h6 text-secondary font-weight-bold mb-3 mt-1"><?php echo $sel_data_captain -> total ; ?></div>
                    </div> 
                    
                    <div class="float-right">
                        <i class="fa fa-car bg-flat-color-5 circle-icon-purple p-3 font-2xl text-light"></i>
                    </div>
                    
                   <div class="float-left">
                       <!-- <?php  if ($imageBlockRatio >= 50) : ?>
                            <span class="text text-danger"><i class="fa fa-arrow-down"> <?php echo $imageBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  else : ?>
                            <span class="text text-success"><i class="fa fa-arrow-up"> <?php echo $imageBlockRatio ?>% </i></span><span class="text-header"> &nbsp;Since last month</span>
                        <?php  endif; ?>-->
                        
                    </div>   -
                
                </div>
               </div>
            </div>
            
            <!--/.col-->

        </div> <!-- .content -->


        </header><!-- /header -->
        <!-- Header-->



        <div class="user-table-content col-sm-12">

            <div class="col-sm-12">
                
                <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Users</strong>
                            </div>
                            
                            
                            <div class="card-body">
                                
                                <!--<form role="form" method="post" action="admob-actions.php?id=<?php echo 1 ?>" enctype="multipart/form-data">-->
                                
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Block/Unblock</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php

  $sel_qur_user   = "Select * from User order by id DESC";
  $sel_run_user   = queryRunner($sel_qur_user);

  while ($sel_data_user  = rowRetriever($sel_run_user)) {

    $id = $sel_data_user['id'];
    $isEnable = $sel_data_user['enable'];
    if($sel_data_user['login_type']=="native"){
      $pictureUrl="uploads/image/".$sel_data_user['profile_picture'];
    }else{
        $pictureUrl=$sel_data_user['profile_picture'];
    }
?>

                <tr>
                    <td><img class="round-image" src="<?php echo $pictureUrl; ?>" style="cursor: pointer; height: 50px; border-radius: 100%; width: 50px; " alt=""><span><?php echo $sel_data_user['email']; ?></span></td>
                    <td><?php echo $sel_data_user['first_name']; ?></td>
                    <td><?php echo $sel_data_user['last_name']; ?></td>
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
                  xhttp.open("GET", "updateUserToggle.php?var1=" + str + "&& var2="+str1+ "&& type=user", true);
                  xhttp.send();
                }
                </script>
                <div id="testing1"></div>
                                        
<?php 

}

?>

                                    </tbody>
                                </table>
                                
                                 <!--For Admob App Id-->
                  
                               <!-- <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_app_id" placeholder="Enter Admob App Id" class="form-control" value="<?php echo $sel_data['admob_app_id']; ?>" required>
                                  </div>
                                </div>-->
                            
                                <!--For Admob Banner Id-->
                              
                                <!--<div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_banner_id" placeholder="Enter Admob Banner Id" class="form-control" value="<?php echo $sel_data['admob_banner_id']; ?>" required>
                                  </div>
                                </div>-->
                                
                                 <!--For Admob Interstitial Id-->
                              
                                <!--<div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="text" name="admob_interstitial_id" placeholder="Enter Admob Interstitial Id" class="form-control" value="<?php echo $sel_data['admob_interstitial_id']; ?>" >
                                  </div>
                                </div>
                                
                                <div class="row form-group category-table">
                                  <div class="col col-12 col-sm-7">
                                    <input type="submit" class="btn btn-theme cate-btn text-light" id="cat_insert" name="post_edit" value="Update Configuration">
                                  </div>
                                </div>-->
                                
                                <!--</form>-->
                                
                            </div>
                            
                            
                        </div>

            </div>

        </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->


<?php

    include('footer.php');

?>

