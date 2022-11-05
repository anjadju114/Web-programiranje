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
$e1=$e2=$e3="";
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
  if (empty($_POST["lozinka"])) {
    $e2 = "Morate uneti lozinku";
  } 
  else {
    $lozinka = test_input($_POST["lozinka"]);
    }

  if (empty($_POST["lozinka1"])) {
    $e3 = "Morate uneti lozinku";
  } 
  else if($_POST["lozinka1"]!=$lozinka && $lozinka!="") {
      $e3 = "Lozinke moraju biti iste";
    }
    else{
        $lozinka1 = test_input($_POST["lozinka1"]);
    }
   
}

/* Create database
$sql = "CREATE DATABASE forum";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$dbname = "film";

*/
/*
$sql = "CREATE TABLE  Korisnik(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(30) NOT NULL,
    lozinka VARCHAR(30)NOT NULL,
    lozinka1 VARCHAR(30)NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table korisnik created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      
      $conn->close();
*/
include "con1.php";

$dbname = "forum";
$conn = new mysqli($servername, $username, $password, $dbname);
if($lozinka!="" && $lozinka1!="" && $ime!="")
{
$sql = "INSERT INTO Korisnik (ime, lozinka, lozinka1)
VALUES ('$ime','$lozinka','$lozinka1')";

if ($conn->query($sql) === TRUE) {
  echo "uspelo je";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();


?>

  
<div class="container mt-3">
<div class="row">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Korisnicko ime: <input type="text" name="ime" >
        <span class="error">* <?php echo $e1;?></span>
        <br><br>
        Lozinka: <input type="password" name="lozinka">
        <span class="error">* <?php echo $e2;?></span>
        <br><br>
        Lozinka ponovljena: <input type="password" name="lozinka1">
        <span class="error">* <?php echo $e3;?></span>
        <input type="submit" name="submit" value="Submit">  
      
    </form>
</div>
</div>

</body>

</html>