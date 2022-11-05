<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</head>
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
    $opis= test_input($_POST["opis"]);
    }
  
  if($ime!="" && $opis!="")
  {
    include "con1.php";
    $dbname = "forum";
     $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "INSERT INTO Tema (nazivTeme, opisTeme)
  VALUES ('$ime','$opis)";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>

<body>
<div class="container mt-3">
<div class="row">
    <div class="col">
    <h1>Dobrodlosli na nasu stranicu</h1>
    <p1>  <a href="tema.php">Kreiraj temu</a></p1>
    <div class="col">
    <div class="row">
    <p1> <a href="../login.php">Log in</a></p1>
    </div>
    <div class="row">
    <p1>  <a href="../logovanje.php">Prijava</a></p1>
     </div>
     </div>
</div>
<div class="row">
    <?php
$sql = 'SELECT* FROM Tema';
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   echo 
   "
   <div class='p-5 my-5 border '>";
   while($row = $result->fetch_assoc()) {
      echo 
      "
      <div class=' row'>
      naziv:{$row['id']}  <br> 
      </div>
      <div class=' row'>
      IME : {$row['nazivTeme']} <br> 
      </div>
      <div class=' row'>
      EMAIL : {$row[' opisTeme']} <br> 
      </div>


      ";
    
   }
   echo "</div>";
} else {
    echo "";
  }
  $conn->close();
    ?>
</div>
</div>
</body>

</html>