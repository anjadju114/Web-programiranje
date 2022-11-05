<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="style.css"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
$dbname = "bioskop";
include "conection.php";

// Check connection

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//delete 
$unesi="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
 
   $unesi = test_input($_POST["unesi"]);
 }
 if($unesi!="")
 {
  $sql = "DELETE FROM Rezervacija WHERE id='$unesi'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully ";
} else {
  echo "Error deleting record: " . $conn->error;
}
 }


 
$sql = 'SELECT* FROM Rezervacija';
$result = $conn->query($sql);

  
if ($result->num_rows > 0) {

   echo 
   "
   <div class='p-5 my-5 border '>";
   while($row = $result->fetch_assoc()) {
      echo 
      "
     
      <div class=' row'>
      id :{$row['id']}  <br> 
      </div>
      <div class=' row'>
      IME : {$row['ime']} <br> 
      </div>
      <div class=' row'>
      EMAIL : {$row['email']} <br> 
      </div>
      <div class='row'>
      NAZIV: {$row['naziv_filma']} <br>
      </div>
      <div class='row'>
      VREME : {$row['vreme']} <br> 
      </div>
      <div class='row'>
      BROJ SEDISTA : {$row['broj_sedista']} <br><br> 
      </div>

      ";
    
   }
   echo "</div>";
} else {
    echo "0 results";
  }

  $conn->close();
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Unesi koji element zelis uklonit <input type="text" name="unesi" >
  <br><br>
  <input type="submit" name="submit" value="Ukloni">  
</form>
<?php

?>
 