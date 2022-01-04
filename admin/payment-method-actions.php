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


if(isset($_POST['payment_method_insert']))
{   
      
      $payment_method_name = mysql_real_escape_string($_POST['payment_method_name']);
      $payment_method_tag = mysql_real_escape_string($_POST['payment_method_tag']);
      
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

      $query = "INSERT into PaymentMethod (name,tag,picture) VALUES ('".$payment_method_name."','".$payment_method_tag."','".$filenameImg."')";
      $run = queryRunner($query);

      if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:payment-method.php");

        }

    }
else if (isset($_POST['payment_method_edit'])) 
{
     
      $payment_method_name = mysql_real_escape_string($_POST['payment_method_name']);
      $payment_method_tag = mysql_real_escape_string($_POST['payment_method_tag']);
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


      $update = "UPDATE PaymentMethod Set name = '".$payment_method_name."' , tag = '".$payment_method_tag."'";
      if (!empty($filenameImg)) {
         $update= $update." , picture = '".$filenameImg."'";
       }  
      $update = $update." where id = '".$id."' ";
      $run = queryRunner($update);

      if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:payment-method.php");

            }


    }
else
{

      $id = $_GET['id'];
      $delete = "DELETE FROM PaymentMethod where id = '".$id."'";
      $res = queryRunner($delete);
      if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:payment-method.php");
        }
        
    }



function imageResize($imageResourceId,$width,$height) {

  $targetWidth = $width * 0.4;
  $targetHeight = $height * 0.4;


  $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
  imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);

  return $targetLayer;
}


