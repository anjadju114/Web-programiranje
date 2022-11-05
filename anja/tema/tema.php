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
<body>
</head>
<body>
<?php
$ime=$lozinka=$lozinka1="";
$e1=$e2=$opis="";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ime"])) {
    $e1 = "Morate uneti ime";
  } else {
    $ime= test_input($_POST["ime"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$ime)) {
      $e1 = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["opis"])) {
    $e2 = "Morate uneti opis";
  } else {
    $iopis= test_input($_POST["opis"]);
    }
  }


  include "con1.php";
 $dbname = "forum";
  $conn = new mysqli($servername, $username, $password, $dbname);
/*$sql = "CREATE TABLE  Tema(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nazivTeme VARCHAR(30) NOT NULL,
    opisTeme VARCHAR(30)NOT NULL,
   datumKreiranja VARCHAR(30)NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table tema created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      */
      $conn->close();

?>

  
<div class="container mt-3">
<div class="row  text-center">
    <form method="post" action="index.php">  
        Naziv: <input type="text" name="ime" >
        <span class="error">* <?php echo $e1;?></span>
        <br><br>
        Opis: <input type="text" name="opis">
        <span class="error">* <?php echo $e2;?></span>
        <br><br>
        <input type="submit" name="submit" value="Kreiraj">  
      
    </form>
</div>
</div>

</body>

</html>