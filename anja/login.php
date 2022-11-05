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
$e1=$e2=$e3=$p="";
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
   
if($lozinka!="" && $ime!="")
{
    include "con1.php";
    $dbname = "forum";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT id, ime, lozinka, lozinka1 FROM korisnik"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       
        while(($row = $result->fetch_assoc()) && $p!=1) {
           
            if( $ime==$row["ime"] ) {
                 if( $ime==$row["ime"] && $lozinka==$row["lozinka"]) {$p=1;}
                 else  $p=2;
            }

        }
    }

        if($p=="")
        {
            echo "<br>";
            echo "Niste sing inovani";
            
        }
        else if($p==2)
        {
            echo "<br>";
            echo "Pogresna lozinka";

        }
        else{
        echo "<br>";
        echo "Uspesno ste logovani";
        
        }
        $p="";


}
else {
    echo "<br>";
  echo "Niste sing inovani";
}
} 



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

        <input type="submit" name="submit" value="Submit">  
      
    </form>
</div>
</div>

</body>

</html>