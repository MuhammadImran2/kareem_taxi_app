<?php


  $country_edit = "category-edit";


include('header.php');

/*function queryRunner($query){
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
    }*/


$id = $_GET['id'];

  $sel_qur = "SELECT * FROM Country where id = '" . $id . "'";
  $sel_run = queryRunner($sel_qur);
  while ($sel_data = rowRetriever($sel_run)){
      $country_name = $sel_data['name'];
      $country_per = $sel_data['percentage'];
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

                  <form role="form" method="post" action="country-actions.php?id=<?php echo $id ?>" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="country_name" placeholder="Enter Country Name" class="form-control" value="<?php echo $country_name; ?>" required>
                      </div>
                    </div>
                    
                     <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="country_percentage" placeholder="Enter Country Percentage" class="form-control" value="<?php echo $country_per; ?>" required>
                      </div>
                    </div>
                    
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="submit" class="btn btn-theme cate-btn text-light" id="country_edit" name="country_edit" value="Update Country">
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

