<?php
$email = $film = $ime = $prezime = "";

$sedista = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $email = test_input($_POST["email"]);
    $prezime = test_input($_POST["prezime"]);
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ime"])) {
        $imeErr = "Ime je obavezno";
    } else {
        $ime = test_input($_POST["ime"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email je obavezan";
    } else {
        $email = test_input($_POST["email"]);
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$ime','$prezime','$email')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
