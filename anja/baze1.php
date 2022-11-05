<?php


//Cre$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
/*$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE  Rezervacija(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(30) NOT NULL,
email VARCHAR(50)NOT NULL,
naziv_filma VARCHAR(30) NOT NULL,
vreme VARCHAR(30) NOT NULL,
broj_sedista VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  
  $conn->close();

*/

?>
<?php

// Check connection

// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = "";
$sediste= $sedisteerr="";
$filmerr=$vremerr="";
$film=$vreme="";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bioskop";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Ime je neophodno";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email je neophodan";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["film"])) {
    $filmerr= "Film  je neophodan";
  }
  else
  {
    $film = test_input($_POST["film"]);
  }
 
  if (empty($_POST["vreme"])) {
    $vremerr = "Vreme je neophodno";
  }
  else{
    $vreme = test_input($_POST["vreme"]);
  }
  if (empty($_POST["sediste"])) {
    $sedisteerr = "Sediste je neophodno";
  }
  else{
    $sediste = test_input($_POST["sediste"]);
  }


}



  
  // sql to create table

$sql="INSERT INTO Rezervacija (ime, email,naziv_filma , vreme, broj_sedista)

 VALUES ('$name','$email','$film','$vreme','$sediste')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

include "conection.php";


   $conn->close();

 ?>
  
