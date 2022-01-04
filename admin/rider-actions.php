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



    if(isset($_POST['post_insert']))
    {   
      
      $product_name = mysql_real_escape_string($_POST['product_name']);
      $product_description = mysql_real_escape_string($_POST['product_description']);
      $product_price    = $_POST['product_price'];
      $category_id = $_POST['category_id'];
      $restaurant_id = $_POST['id'];
      
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

      /*move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);

      $folderVideo = "uploads/image/";
      $filenameVideo = $_FILES['postVideoFile']['name'];
      $targetVideo = $folderVideo.$filenameVideo;
      move_uploaded_file($_FILES['postVideoFile']['tmp_name'] , $targetVideo);*/

      $query = "Insert into Product (name, description , price , product_image) 
       VALUES ('".$product_name."', '".$product_description."', '".$product_price."', '".$filenameImg."' )";
      $run = queryRunner($query);
      $product_id = findLastInsertId();
      
      $query = "INSERT INTO ProductMeta (term_id,meta_key,meta_value)
     VALUES
    ('$product_id','_product_restaurant_id','$restaurant_id'),
    ('$product_id','_product_restaurant_menu_id','$category_id')";
    $run = queryRunner($query);

      if ($run) {

            session_start();
            $_SESSION['success-insert'] = 'success';
            header("location:product.php?id=".$restaurant_id);

       }

     


    }
    else{

      $id = $_GET['id'];
      
      $delete = "DELETE FROM Rider where id = '".$id."'";
      $run = queryRunner($delete);
    
        if($run)
        {
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:rider.php");
        }
    }









function imageResize($imageResourceId,$width,$height) {

  $targetWidth = $width * 0.4;
  $targetHeight = $height * 0.4;


  $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
  //$targetLayer=imagecropauto($targetLayer , IMG_CROP_DEFAULT);
  imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);

  return $targetLayer;
}



