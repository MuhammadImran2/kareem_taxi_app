<?php

  $comments = "comments";


include('header.php');

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
                            
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Captain</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                            <th>Block/Unblock</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php

$sel_qur_com = "SELECT rating.id , captain.name , rating.rating , rating.review , rating.enable
from Rating as rating
INNER JOIN Captain as captain ON captain.id = rating.captain_id
order by rating.id DESC";
$sel_run_com = mysql_query($sel_qur_com);

while($sel_data_com = mysql_fetch_array($sel_run_com)) {  

  $id = $sel_data_com['id'];
  $name = $sel_data_com['name'];
  $rating = $sel_data_com['rating'];
  $review = $sel_data_com['review'];
  $isEnable = $sel_data_com['enable'];

?>

                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $rating; ?></td>
                    <td><?php echo $review; ?></td>
                    <td>
                      <label class="switch switch-text switch-info switch-pill">
                          <input type="checkbox" class="switch-input" onClick="show1(<?php echo $isEnable; ?>, <?php echo $id; ?>)" <?php if($isEnable == 1): echo "checked"; endif; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
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
                      $("#testing1").find("script").each(function(i) {
                          eval($(this).text());
                      });
                    }
                  };
                  xhttp.open("GET", "updateCommentToggle.php?var1=" + str + "&& var2="+str1, true);
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

