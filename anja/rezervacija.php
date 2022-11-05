<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = "";
$sediste= $sedisteerr="";
$filmerr=$vremerr="";
$film=$vreme="";
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

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Ime: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Naziv filma
<select name="film" id="film">
	<option value="">--- Izaberi film ---</option>
	<option value="Lier game">Lier game</option>
	<option value="Werewolf game">Werewolf game </option>
	<option value="Tomodachi game">Tomodachi game</option>
</select>
<span class="error">* <?php echo $filmerr;?></span>
<br><br>
Vreme:
<select name="vreme" id="vreme">
	<option value="">--- Izaberi vreme ---</option>
	<option value="16">16:00</option>
	<option value="18">18:00 </option>
	<option value="20">20:00</option>
</select>
  <span class="error">* <?php echo $vremerr;?></span>
  <br><br>
 Broj sedista: <input type="number" min="1" max="15" name="sediste"  value="<?php echo $seiste;?>">
  <span class="error">* <?php echo $sedisteerr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  

</form>
</body>
<?php
$fajl = fopen("fajl.txt", "w") or die("Unable to open file!");
$txt = "Izvrsena je rezervacija na ime ".$name ." za film " . $film . " u terminu " . $vreme .":00.\n". "Broj sedista je " . $sediste;

fwrite($fajl, $txt);

fclose($fajl);
// echo file_put_contents("test.txt","Hello World. Testing!");- kad bi hteli sve u jednoj liniji


?>
</html>