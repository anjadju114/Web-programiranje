
<?php
$target_dir = "anja";
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = is_file($_FILES["fileToUpload"]["tmp_name"]);
  if($check == true) {
    echo "Fajl je  dokument.";
    $uploadOk = 1;
  } else {
    echo "Fajl nije dokument.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Fajl vec postoji.";
  $uploadOk = 0;
}
else
{
    echo "";
  $uploadOk = 1;
}


if($imageFileType != "txt" && $imageFileType != "doc" && $imageFileType != "docx"
&& $imageFileType != "pdf" ) {
  echo "Samo doc, txt, pdf, docx su dozovljeni.";
  $uploadOk = 0;
}
else
{
    echo "";
  $uploadOk = 1;
}

if ($uploadOk == 0) {
  echo "Fajl nije otpremljen.";
} 
else 
{
    if ($_FILES["fileToUpload"]["size"] > 300000) {
        echo "Fajl je prevelik.";
        $uploadOk = 0;
      }
      else
      {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Fajl ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " je otpremljen.";
          } else {
            echo "Greska pri otpremnjavanju";
          }
          echo "";
        $uploadOk = 1;
      }
  
}
?>

