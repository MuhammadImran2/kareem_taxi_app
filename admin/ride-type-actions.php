 <?php   

session_start();
if(empty($_SESSION['uid']))
 {
    header("location:login.php");
  }


include('connection.php');
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


if(isset($_POST['ride_type_insert']))
{   
      
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $ride_type_name = mysql_real_escape_string($_POST['ride_type_name']);
      $ride_type_tagline = mysql_real_escape_string($_POST['ride_type_tagline']);
      $ride_type_tag = mysql_real_escape_string($_POST['ride_type_tag']);
      $ride_type_category_id = mysql_real_escape_string($_POST['ride_type_category_id']);
      $ride_type_place_id = mysql_real_escape_string($_POST['ride_type_city_id']);
      
      $filenameImg = $_FILES['postImgFile']['name'];
      $file = $_FILES['postImgFile']['tmp_name']; 
      $sourceProperties = getimagesize($file);
      $fileNewName = pathinfo($_FILES['postImgFile']['name'], PATHINFO_FILENAME);
      $folderPath = "uploads/image/";
      $ext = pathinfo($_FILES['postImgFile']['name'], PATHINFO_EXTENSION);
      $imageType = $sourceProperties[2];
      switch ($imageType) {
            
              case IMAGETYPE_PNG:
                  $imageResourceId = imagecreatefrompng($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              case IMAGETYPE_GIF:
                  $imageResourceId = imagecreatefromgif($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              case IMAGETYPE_JPEG:
                  $imageResourceId = imagecreatefromjpeg($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              default:
                  echo "Invalid Image type.";
                  exit;
                  break;
          }
      move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
      

      $query = "INSERT into RideType (place_id,ride_category,name,tagline,tag,picture) VALUES ('".$ride_type_place_id."','".$ride_type_category_id."','".$ride_type_name."','".$ride_type_tagline."','".$ride_type_tag."','".$filenameImg."')";
      $run = queryRunner($query);

      if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:ride-type.php?id=".$country_id);

        }

    }
else if (isset($_POST['ride_type_edit'])) 
{
     
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $ride_type_name = mysql_real_escape_string($_POST['ride_type_name']);
      $ride_type_tagline = mysql_real_escape_string($_POST['ride_type_tagline']);
      $ride_type_tag = mysql_real_escape_string($_POST['ride_type_tag']);
      $ride_type_category_id = mysql_real_escape_string($_POST['ride_type_category_id']);
      $ride_type_place_id = mysql_real_escape_string($_POST['ride_type_city_id']);
      $id = $_GET['id'];
      
      $filenameImg = $_FILES['postImgFile']['name'];
       
      if (!empty($filenameImg)) {
      
        $file = $_FILES['postImgFile']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = pathinfo($_FILES['postImgFile']['name'], PATHINFO_FILENAME);
        $folderPath = "uploads/image/";
        $ext = pathinfo($_FILES['postImgFile']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        switch ($imageType) {
            
              case IMAGETYPE_PNG:
                  $imageResourceId = imagecreatefrompng($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              case IMAGETYPE_GIF:
                  $imageResourceId = imagecreatefromgif($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              case IMAGETYPE_JPEG:
                  $imageResourceId = imagecreatefromjpeg($file); 
                  $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                  imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                  break;

              default:
                  echo "Invalid Image type.";
                  exit;
                  break;
          }
        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);

      }


      $update = "UPDATE RideType set place_id = '".$ride_type_place_id."' , ride_category = '".$ride_type_category_id."' , name = '".$ride_type_name."' , 
      tagline = '".$ride_type_tagline."' , tag = '".$ride_type_tag."'";
      if(!empty($filenameImg)){
      $update = $update." , picture= '".$filenameImg."'";      
      }
      $update = $update." where id = '".$id."' ";
      $run = queryRunner($update);

      if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:ride-type.php?id=".$country_id);

            }


    }
else
{

      $id = $_GET['id'];
      $country_id = mysql_real_escape_string($_GET['country_id']);
      $delete = "DELETE FROM RideType where id = '".$id."'";
      $res = queryRunner($delete);
      if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:ride-type.php?id=".$country_id);
        }
        
    }


function imageResize($imageResourceId,$width,$height) {

  $targetWidth = $width * 0.4;
  $targetHeight = $height * 0.4;


  $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
  imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);

  return $targetLayer;
}




