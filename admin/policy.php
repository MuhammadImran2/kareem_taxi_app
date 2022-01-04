<?php

  $policy = "policy";


include('header.php');


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
               //$id = $_GET['id'];

                $sel_qur = "select * from Policy where id = '1' ";
                $sel_run = queryRunner($sel_qur);
                $sel_data = rowRetriever($sel_run);

            ?> 


        </header><!-- /header -->
        <!-- Header-->


        <?php 

        if (!empty($_SESSION['success-insert'])) {
          ?>
            <div class="center">
              <div class="myAlert-top alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                <strong>Successfully!</strong> Policy is added. 
              </div>
            </div>
          <?php
          unset($_SESSION['success-insert']);
        }
        
     


        ?>

        <div class="category-table-content col-sm-12">

            <div class="col-sm-12">
                
              <div class="card">
                <div class="card-body cat-card-body">
                  <form role="form" method="post" action="policy-actions.php" enctype="multipart/form-data">

                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="text" name="policy_title" placeholder="Enter policy title..." class="form-control" value="<?php echo $sel_data['title']; ?>"  required>
                      </div>
                    </div>
                    
                     <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <textarea id="mytextarea" name="policy_desc"><?php echo $sel_data['description']; ?></textarea>
                        
                                <script type="text/javascript">
                                 CKEDITOR.replace( 'mytextarea', {
                                    height: 300,
                                    filebrowserUploadUrl: "ckeditor_fileupload/ajaxfile.php?type=file",
                                    filebrowserImageUploadUrl: "ckeditor_fileupload/ajaxfile.php?type=image",
                            
                                 } );
                                 </script>
                                
                      </div>
                    </div>
                    
                    <!--<div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <textarea id="mytextarea" name="policy_desc" ><?php echo $sel_data['description']; ?></textarea>
                      </div>
                    </div>-->
                    
                    <div class="row form-group category-table">
                      <div class="col col-12 col-sm-7">
                        <input type="submit" class="btn btn-theme cate-btn text-light" id="cat_insert" name="policy_insert" value="Update Policy">
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

<style>
  .tox-menu.tox-collection.tox-collection--list.tox-selected-menu {
      left: -757.953px !important;
  }
</style>