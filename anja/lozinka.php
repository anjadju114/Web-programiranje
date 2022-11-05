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
    $name = test_input($_POST["ime"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $e1 = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["lozinka"])) {
    $e2 = "Morate uneti lozinku";
  } else {
    $lozinka = test_input($_POST["lozinka"]);
    }

    $lozinka1 = test_input($_POST["lozinka1"]);
  if (empty($_POST["lozinka1"])) {
    $e3 = "Morate uneti lozinku";
  } else if($lozinka1!=$lozinka1) {
      $e2 = "Lozinke moraju biti iste";
    }
   
}
include "con1.php";

$dbname = "forum";
$conn = new mysqli($servername, $username, $password, $dbname);
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
$sql = "INSERT INTO Korisnik (ime, lozinka, lozinka1)
VALUES ('$ime','$lozinka','$lozinka1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

  

